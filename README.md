# Topupmama-bookcatalog-Assessment
API endpoints for the catalog in php(Lumen)

Live url from heroku
https://topupmama-book.herokuapp.com/
The api has the following endpoints

## GET
- View all the authors
http://127.0.0.1:8000/api/authors
- View one author
http://127.0.0.1:8000/api/authors/{id}
- view all books
http://127.0.0.1:8000/api/books
- View books with respective to their authors
http://127.0.0.1:8000/api/authors/{id}/books
- View all comments
http://127.0.0.1:8000/api/comments
- View comments in relation to books
http://127.0.0.1:8000/books/{book_id}/comments/{comment_id}

## POST
- Post authors
http://127.0.0.1:8000/api/authors
- Post books
http://127.0.0.1:8000/api/authors/{author_id}/books
- Comments
http://127.0.0.1:8000/api/books/{book_id}/comments

### And their respective PUT and DELETE counterparts

## PUT
- Authors
http://127.0.0.1:8000/api/authors/{id}
- Books
http://127.0.0.1:8000/api/authors/{author_id}/books/{book_id}
## DELETE

- Authors
http://127.0.0.1:8000/api/authors/{id}
- Books
http://127.0.0.1:8000/api/authors/{author_id}/books/{book_id}

## How to run the app
-- Clone the project 
-- Navigate into the project root
-- setup the database
-- Make migrations
-- Run the app and use Postman to consume the api endpoints.