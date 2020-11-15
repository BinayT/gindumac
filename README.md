# Gindumac-Machines

## Description

This is a simple React+Symfony app that shows the machines stored in the database, as well as fully funcional CRUD API if all features are needed. For now in the application we can just read the Database but with **Postman** we can access to all the API calls.

## FrontEnd

After cloning the **Repository** , type these 2 commands -> `cd client` and `npm install` which will go inside the client folder and install the required packages from `package.json` file.

## Starting the application

First of the open another terminal and type `cd server` to access the server side folder. Once you are in it, on the previous terminal (client one) type `npm start` and on the current terminal (server one) type `symfony server:start`. The client will run on your `http://localhost:3000` whereas the server will run on your `http://localhost:8000`.

## API Endpoints (Backend Routes)

| HTTP Method | URL                       | Request Body                      | Success status | Error Status | Description                                                  |
| ----------- | ------------------------- | --------------------------------- | -------------- | ------------ | ------------------------------------------------------------ |
| GET         | `/machines`                | None                   | 200            | 404          | Returns all the machines in the database           |
| GET         | `/machine/{id}`                | None                   | 200            | 404          | Returns a machine with the {id} provided from the database           |
| POST        | `/machine/add`            | {brand,model,manufacturer,price,images}           | 201            | 404          | Adds a new machine in the Database |
| PUT        | `/machine/update/{id}`             | One of these -> {brand,model,manufacturer,price,images}              | 200            | 401          | Updates a machine with {id} that user wishes |
| DELETE         | `/machine/delete/{id}`                | None                  | 204            | 404          | Deletes the selected machine           |
