CREATE TABLE Users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(128) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(20) NOT NULL
);

CREATE TABLE UserBooks (
    record_id SERIAL PRIMARY KEY,
    user_id INT REFERENCES Users(user_id),
    book_id INT REFERENCES Books(book_id),
    status VARCHAR(50),
    read_date DATE,
    abandon_date DATE,
    rating INT
);
