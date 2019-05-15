```bash
# Install dependencies
composer install

# Generate the protobuf classes
composer gen-proto
composer gen-proto-cpp

# Start PHP DAEMON server
php -t ./public

# (in a different terminal) make a request
php firstCall_requests.php
php secondCall_requests.php
```
