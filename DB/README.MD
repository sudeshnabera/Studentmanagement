# Database Class Documentation

The `Database` class is a PHP class that provides a simple interface for interacting with a MySQL database using the PDO extension. It allows you to connect to the database, execute SQL queries, and perform common database operations such as fetching data, inserting records, updating records, and deleting records.

## Constructor

### `__construct($host, $username, $password, $database)`

- **Description**: Initializes a new instance of the `Database` class with the specified database connection parameters.
  
- **Parameters**:
  - `$host` (string): The hostname or IP address of the database server.
  - `$username` (string): The username used to connect to the database.
  - `$password` (string): The password for the database user.
  - `$database` (string): The name of the database to connect to.

## Methods

### `connect()`

- **Description**: Establishes a connection to the MySQL database using the provided connection parameters.

- **Returns**:
  - `true` (boolean) if the connection is successful.
  - Dies with an error message if the connection fails.

### `disconnect()`

- **Description**: Closes the database connection.

### `query($sql, $params = [])`

- **Description**: Executes a SQL query on the connected database.

- **Parameters**:
  - `$sql` (string): The SQL query to execute.
  - `$params` (array, optional): An associative array of parameters to bind to the query.

- **Returns**:
  - A PDOStatement object representing the result of the query.
  - Dies with an error message if the query fails.

### `fetch($sql, $params = [])`

- **Description**: Executes a SELECT query and fetches a single row of data.

- **Parameters**:
  - `$sql` (string): The SQL SELECT query to execute.
  - `$params` (array, optional): An associative array of parameters to bind to the query.

- **Returns**:
  - An associative array representing a single row of data from the result.
  - Dies with an error message if the query fails.

### `fetchAll($sql, $params = [])`

- **Description**: Executes a SELECT query and fetches all rows of data.

- **Parameters**:
  - `$sql` (string): The SQL SELECT query to execute.
  - `$params` (array, optional): An associative array of parameters to bind to the query.

- **Returns**:
  - An array of associative arrays, each representing a row of data from the result.
  - Dies with an error message if the query fails.

### `insert($table, $data)`

- **Description**: Inserts a new record into a database table.

- **Parameters**:
  - `$table` (string): The name of the table to insert the record into.
  - `$data` (array): An associative array of column names and values to be inserted.

- **Returns**:
  - The ID of the newly inserted record.
  - Dies with an error message if the insertion fails.

### `update($table, $data, $where)`

- **Description**: Updates records in a database table that match a specified condition.

- **Parameters**:
  - `$table` (string): The name of the table to update records in.
  - `$data` (array): An associative array of column names and new values.
  - `$where` (string): The WHERE clause to specify which records to update.

- **Returns**:
  - The number of rows updated.
  - Dies with an error message if the update fails.

### `delete($table, $where)`

- **Description**: Deletes records from a database table that match a specified condition.

- **Parameters**:
  - `$table` (string): The name of the table to delete records from.
  - `$where` (string): The WHERE clause to specify which records to delete.

- **Returns**:
  - The number of rows deleted.
  - Dies with an error message if the deletion fails.

## Usage Example

```php
$db = new Database("localhost", "username", "password", "database_name");
if ($db->connect()) {
    // Example queries:
    $result = $db->fetch("SELECT * FROM users WHERE id = :id", ["id" => 1]);
    $results = $db->fetchAll("SELECT * FROM products");
    $newUserId = $db->insert("users", ["username" => "newuser", "email" => "newuser@example.com"]);
    $updatedRows = $db->update("users", ["username" => "updateduser"], "id = :id", ["id" => 2]);
    $deletedRows = $db->delete("users", "id = :id", ["id" => 3]);

    $db->disconnect();
}
