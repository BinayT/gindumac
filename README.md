# Gindumac-Machines

## Description

This is a simple React+Symfony app that shows the machines stored in the database, as well as fully funcional CRUD API if all features are needed. For now in the application we can just read the Database but with **Postman** we can access to all the API calls.

## FrontEnd

After cloning the **Repository** , type these 2 commands -> `cd client` and `npm install` which will go inside the client folder and install the required packages from `package.json` file.

## Database

There's a SQL file included named `gindumac_db_dump` on the root folder. To get the datas in it, all you have to do is create a schema named `gindumac_db` in MySQL WorkBench(or any other SQL server or interface).

Then run this command to extract all the tables along with data in the `gindumac_db` schema. ----> `mysql -u YourSQLUserName gindumac_db < gindumac_db_dump.sql`. Make sure the gindumac_db is located inside `C:\xampp\mysql\data` or where your databases are located at since the MySQL will look in it to find if the database exists or not.

## Starting the application

First of the open another terminal and type `cd server` to access the server side folder. Once you are in it, on the previous terminal (client one) type `npm start` and on the current terminal (server one) type `symfony server:start`. The client will run on your `http://localhost:3000` whereas the server will run on your `http://localhost:8000`.

## API Endpoints (Backend Routes)

| HTTP Method | URL                       | Request Body                      | Success status | Error Status | Description                                                  |
| ----------- | ------------------------- | --------------------------------- | -------------- | ------------ | ------------------------------------------------------------ |
| GET         | `/machines`                | None                   | 200            | 404          | Returns all the machines in the database           |
| GET         | `/machine/{id}`                | None                   | 200            | 404          | Returns a machine with the {id} provided from the database           |
| POST        | `/machine/add`            | {brand,model,manufacturer,price,images}           | 201            | 404          | Adds a new machine in the Database |
| PUT        | `/machine/update/{id}`             | One of these -> {brand,model,manufacturer,price,images}              | 200            | 404          | Updates a machine with {id} that user wishes |
| DELETE         | `/machine/delete/{id}`                | None                  | 204            | 404          | Deletes the selected machine           |
