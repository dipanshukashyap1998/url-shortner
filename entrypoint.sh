#!/bin/bash
set -e

# Start main process first so nginx can connect immediately.
"$@" &
main_pid=$!

run_migrations() {
    echo "Running startup migration/seed..."

    if [ ! -f artisan ]; then
        echo "artisan file not found in $(pwd), skipping migration/seed step."
        return
    fi

    # Give database time to boot and accept connections.
    sleep 5

    max_retries=30
    counter=0

    until php artisan migrate --seed --force > /dev/null 2>&1; do
        counter=$((counter + 1))
        if [ $counter -gt $max_retries ]; then
            echo "Migration/seed failed after $max_retries attempts. Skipping for now."
            return
        fi
        echo "Waiting for database/migrations... (attempt $counter/$max_retries)"
        sleep 2
    done

    echo "Migrations and seeders completed."
}

run_migrations

# Keep container attached to main process.
wait "$main_pid"
