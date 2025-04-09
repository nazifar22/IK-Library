-- Create the 'books' table
CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    description TEXT NOT NULL,
    cover_image TEXT,
    year_of_publication INTEGER,
    source_planet TEXT,
    average_rating REAL DEFAULT 0.0
);

-- Create the 'users' table
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    role TEXT DEFAULT 'user'                                -- Default role is 'user', admin must be explicitly set
);

-- Create the 'reviews' table
CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY,
    book_id INTEGER,
    user_id INTEGER,
    rating INTEGER,
    comment TEXT,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create the 'read_books' table to track which books a user has read
CREATE TABLE IF NOT EXISTS read_books (
    user_id INTEGER,
    book_id INTEGER,
    read_date DATE DEFAULT CURRENT_DATE,
    PRIMARY KEY (user_id, book_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);