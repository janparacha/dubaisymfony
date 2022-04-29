#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        id_category   Int  Auto_increment  NOT NULL ,
        name_category Varchar (80) NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (id_category)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: supplier
#------------------------------------------------------------

CREATE TABLE supplier(
        id_supplier   Int  Auto_increment  NOT NULL ,
        name_supplier Varchar (80) NOT NULL ,
        from          Varchar (80) NOT NULL
	,CONSTRAINT supplier_PK PRIMARY KEY (id_supplier)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: address
#------------------------------------------------------------

CREATE TABLE address(
        id_address            Int  Auto_increment  NOT NULL ,
        number                Varchar (70) NOT NULL ,
        street                Varchar (70) NOT NULL ,
        country_code          Int NOT NULL ,
        city                  Varchar (70) NOT NULL ,
        complementary_message Varchar (70) NOT NULL
	,CONSTRAINT address_PK PRIMARY KEY (id_address)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user    Int  Auto_increment  NOT NULL ,
        gender     Varchar (50) NOT NULL ,
        name       Varchar (50) NOT NULL ,
        surname    Varchar (50) NOT NULL ,
        phone      Int NOT NULL ,
        mail       Varchar (70) NOT NULL ,
        password   Varchar (70) ,
        role       Int ,
        id_address Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_user)

	,CONSTRAINT user_address_FK FOREIGN KEY (id_address) REFERENCES address(id_address)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: command
#------------------------------------------------------------

CREATE TABLE command(
        id_command      Int  Auto_increment  NOT NULL ,
        date            Datetime NOT NULL ,
        payment_type    Varchar (70) NOT NULL ,
        delivery_option Bool NOT NULL ,
        delivery_number Varchar (70) NOT NULL ,
        id_user         Int NOT NULL
	,CONSTRAINT command_PK PRIMARY KEY (id_command)

	,CONSTRAINT command_user_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: product
#------------------------------------------------------------

CREATE TABLE product(
        id_product        Int  Auto_increment  NOT NULL ,
        name_product      Varchar (70) NOT NULL ,
        brand_product     Varchar (70) ,
        quantity_ml       Int ,
        reference_product Int NOT NULL ,
        price_ht          Int NOT NULL ,
        tva               Int NOT NULL ,
        stock             Int NOT NULL ,
        title             Varchar (50) NOT NULL ,
        content           Varchar (150) NOT NULL ,
        created_at        Datetime NOT NULL ,
        score             Int NOT NULL ,
        id_category       Int NOT NULL ,
        id_user           Int NOT NULL ,
        id_user_rating    Int NOT NULL
	,CONSTRAINT product_PK PRIMARY KEY (id_product)

	,CONSTRAINT product_category_FK FOREIGN KEY (id_category) REFERENCES category(id_category)
	,CONSTRAINT product_user0_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
	,CONSTRAINT product_user1_FK FOREIGN KEY (id_user_rating) REFERENCES user(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: composed
#------------------------------------------------------------

CREATE TABLE composed(
        id_product Int NOT NULL ,
        id_command Int NOT NULL ,
        quantity   Int NOT NULL ,
        discount   Int NOT NULL
	,CONSTRAINT composed_PK PRIMARY KEY (id_product,id_command)

	,CONSTRAINT composed_product_FK FOREIGN KEY (id_product) REFERENCES product(id_product)
	,CONSTRAINT composed_command0_FK FOREIGN KEY (id_command) REFERENCES command(id_command)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: supply
#------------------------------------------------------------

CREATE TABLE supply(
        id_supplier Int NOT NULL ,
        id_product  Int NOT NULL
	,CONSTRAINT supply_PK PRIMARY KEY (id_supplier,id_product)

	,CONSTRAINT supply_supplier_FK FOREIGN KEY (id_supplier) REFERENCES supplier(id_supplier)
	,CONSTRAINT supply_product0_FK FOREIGN KEY (id_product) REFERENCES product(id_product)
)ENGINE=InnoDB;

