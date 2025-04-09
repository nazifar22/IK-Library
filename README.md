For this project, I built a server-side web application using PHP to catalogue books collected across different Stargate missions. The application features a main page that displays a list of all books with their titles, authors, and descriptions. This page is accessible to both guests and logged-in users. Each book links to a detailed view where full information—such as the book’s title, author, description, cover image, year of publication, and source planet—is displayed.

Registered users can log in or register via dedicated forms. Registration requires a unique username, a valid email, and matching passwords. Errors are clearly displayed on the form if validation fails, and the form remains stateful. Upon successful registration or login, users are redirected to the main page. Authenticated users can rate and review books, as well as mark them as read. Their activity is visible on their user profile page, which shows their reviews and list of books they've read.

An admin user with the credentials admin / admin is included by default. Once logged in, the admin can access a separate interface to add new books to the collection. All data—users, books, and reviews—are stored in JSON files and loaded using a modular Storage class.

The application is styled with CSS for responsive layout, and validation is handled on the server side only, with browser validation disabled using novalidate. The structure avoids using any external PHP frameworks, in line with assignment requirements.

How to Use:
Open the website in a browser.
Browse books freely on the homepage.
Click a book to see detailed information.
Register or log in to:
Rate and review books.
Mark books as read.
View your profile and reading history.
Log in as admin / admin to add new books.
All changes are stored automatically.
