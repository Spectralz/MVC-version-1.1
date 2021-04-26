USE shop;

DROP TABLE IF EXISTS orders_list ;
DROP TABLE IF EXISTS orders ;
DROP TABLE IF EXISTS cart ;
DROP TABLE IF EXISTS users ;
DROP TABLE IF EXISTS sessions ;
DROP TABLE IF EXISTS roles ;
DROP TABLE IF EXISTS product ;

DROP DATABASE IF EXISTS shop;

CREATE DATABASE IF NOT EXISTS shop;

USE shop;

CREATE TABLE IF NOT EXISTS category (
    id INT (10) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    name VARCHAR (20)    NOT NULL
);

CREATE TABLE IF NOT EXISTS product (
    id      INT (10) AUTO_INCREMENT PRIMARY KEY ,
    name    varchar (20) NOT NULL ,
    price   INT (10) NOT NULL,
    quantity INT (10) NOT NULL,
    category_id INT (10),
    description text (255),
    FOREIGN KEY (category_id) REFERENCES category(id)
    );

CREATE TABLE IF NOT EXISTS roles (
    id INT (10) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    type VARCHAR (20)    NOT NULL
    );

CREATE TABLE IF NOT EXISTS sessions (
    id varchar (32) NOT NULL,
    user_id          INT (10)
    );

CREATE TABLE IF NOT EXISTS users (
        id              INT (10) AUTO_INCREMENT PRIMARY KEY,
        name            VARCHAR (20)    NOT NULL ,
        telephone       INT (11)        NOT NULL ,
        email           VARCHAR (20)    NOT NULL ,
        password VARCHAR(255) NOT NULL,
        session VARCHAR(32) NOT NULL,
        role        int (10)    NOT NULL ,
        date_create INT (11)   NOT NULL ,
        FOREIGN KEY (role) REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS cart (
    id         INT (10) AUTO_INCREMENT PRIMARY KEY ,
    product_id          INT (10) NOT NULL,
    user_id          INT (10) NOT NULL,
    quantity INT (10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
    );

CREATE TABLE IF NOT EXISTS orders (
    id         INT (10) AUTO_INCREMENT PRIMARY KEY ,
    user_id          INT (10) NOT NULL,
    date    INT (11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
    );

CREATE TABLE IF NOT EXISTS orders_list (
    id     INT (10) AUTO_INCREMENT PRIMARY KEY ,
    order_id         INT (10) NOT NULL,
    product_id          INT (10) NOT NULL,
    quantity INT (10) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (order_id) REFERENCES orders(id)
    );

INSERT INTO roles (type) VALUES ('Admin');
INSERT INTO roles (type) VALUES ('User');

INSERT INTO users (name, telephone, email, password , session, role, date_create)
VALUES ('admin' , 00000000 , 'admin@email' , '$2y$10$PLZcUHbDVvGcN0Vis7KyP.MtSv2V1T7cImiwm0FQ/RpKrvPO/cdUy' , 0 ,1  , 00000000000  );


/*
Посчитать сколько заказов заказал каждый пользователь в определенный интервал времени.
 */
SELECT name , COUNT(name) FROM users
LEFT JOIN orders o on users.id = o.user_id
WHERE o.id IS NOT NULL
  AND (date BETWEEN 1619001000 AND 1619001999 ) GROUP BY name;

/*
Найти всех пользователей, которые ни разу не оформили ни один заказ.
 */

SELECT name , COUNT(name) FROM users
    LEFT JOIN orders o on users.id = o.user_id
WHERE o.id IS NULL GROUP BY name;

/*
Посчитать сколько раз был куплен каждый продукт.
 */

SELECT product.id , product.name , count( name ) as inOrders , SUM(ol.quantity) as quntitySold
FROM product
    LEFT JOIN orders_list ol on product.id = ol.product_id
GROUP BY product.id, product.name;

/*
Найти тех пользователей которые не оформляли заказ за последние 10 дней.
 */

SELECT name FROM users
                     LEFT JOIN orders o on users.id = o.user_id
WHERE o.id IS NULL
   OR (date NOT BETWEEN 1619001000 AND 1619001999 ) GROUP BY name;

/*
Вывести заказы в отсортированном виде по стоимости заказа.
 */

SELECT o.id , SUM(p.price * orders_list.quantity) FROM orders_list
    LEFT JOIN orders o on orders_list.order_id = o.id
    LEFT JOIN product p on p.id = orders_list.product_id
GROUP BY o.id;


/*
Найти тех пользователей у которых нет ни одной роли (Т.е. не администратор и необычный пользователь).
 */

SELECT id , name FROM users WHERE role IS NULL;