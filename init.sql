CREATE TABLE users(username character varying(255) PRIMARY KEY NOT NULL, password text NOT NULL, role character varying(255) NOT NULL DEFAULT 'user');
/* username = admin, password = 123456 */
INSERT INTO users(username, password, role) VALUES('admin', '$2a$06$Y2TtankzyiK/OF1yZA4GsOJBhuoP7o99XbfufEeJ0OOJwjUcPB9LO', 'admin');
