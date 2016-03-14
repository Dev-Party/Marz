## Marz

Marz es proyecto de API pública para la gestión de radio en Internet.

### Base de Datos
Users
	id – INTEGER
	name – VARCHAR(255)
	email – VARCHAR(255) UNIQUE
	password – VARCHAR(60)
	remember_token – VARCHAR(100) NULL
	created_at – TIMESTAMP NULL
	updated_at – TIMESTAMP NULL