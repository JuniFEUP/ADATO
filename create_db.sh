#!/bin/bash
# Scrip to create ADATO database
echo "Creating database..."
mkdir -p assets
sqlite3 assets/adatoDB.db << EOF
CREATE TABLE participants (
id  INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT NOT NULL,
email TEXT NOT NULL,
course_year TEXT NOT NULL,
course TEXT NOT NULL,
linkedin TEXT,
registration_date DATETIME DEFAULT CURRENT_TIMESTAMP);
.exit
EOF
