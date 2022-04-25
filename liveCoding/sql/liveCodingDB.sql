USE `livecoding`;

CREATE TABLE categories(
    
    id int PRIMARY KEY AUTO_INCREMENT,
    categoryName varchar (255),
    description varchar(255)
    
   );

   INSERT INTO categories(categoryName,description) 
   VALUES('hair care','products for hair care');

   CREATE TABLE products(
    
    id int PRIMARY KEY AUTO_INCREMENT,
    productName varchar (255),
    description varchar(255),
    price float,
    idCategory int ,FOREIGN KEY(idCategory) REFERENCES categories (id)
    
    );

    CREATE TABLE utilisateur(

        id int PRIMARY KEY AUTO_INCREMENT,
        nom varchar(255),
        prenom varchar(255),
        modePass varchar(255),
        email varchar (255),
        role varchar (255)
    )


    CREATE TABLE panier (
        id int PRIMARY KEY AUTO_INCREMENT,
         Reference_Visituer varchar(255) 
         
         );

 CREATE TABLE Ligne_Panier(

    Quantité_Panier_Produit varchar(255)
    );

CREATE TABLE Approvisionnement (
    id int PRIMARY KEY AUTO_INCREMENT,
    quantité_ajouter int,
    date_ajouter DATE
    
    );
