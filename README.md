# book-manager-laravel

### Prerequisites

- PHP 8.x
- Composer
- MySQL
- Laravel 9.x (or higher)

### Setup

Everything should be working once you migrate the database and get the initial data from the seeder:
- php artisan migrate
- php artisan migrate:fresh --seed
- php artisan serve


### DB Data in case of error:
If the seeder is not working just apply this MySQL code manually at your localhost admin.

```sql
INSERT INTO books (title, author, genre, release_date, description, cover_image, created_at, updated_at)
VALUES
('Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 'Fantasy', '1997-06-26', 'A young boy discovers he is a wizard and attends a magical school where he embarks on an epic adventure.', 'harry_potter_cover.jpg', NOW(), NOW()),

('The Lord of the Rings: The Fellowship of the Ring', 'J.R.R. Tolkien', 'Fantasy', '1954-07-29', 'The first part of a legendary trilogy where a hobbit and his companions embark on a quest to destroy a powerful ring.', 'lotr_fellowship_cover.jpg', NOW(), NOW()),

('To Kill a Mockingbird', 'Harper Lee', 'Fiction', '1960-07-11', 'A deeply moving novel about racial injustice and moral growth in the American South.', 'mockingbird_cover.jpg', NOW(), NOW()),

('1984', 'George Orwell', 'Dystopian', '1949-06-08', 'A chilling portrayal of a totalitarian regime where the government controls every aspect of life.', '1984_cover.jpg', NOW(), NOW()),

('The Great Gatsby', 'F. Scott Fitzgerald', 'Classic', '1925-04-10', 'A novel set in the Jazz Age that explores themes of wealth, ambition, and the American Dream.', 'gatsby_cover.jpg', NOW(), NOW());
