define({ "api": [
  {
    "type": "get",
    "url": "/modulation",
    "title": "Listar",
    "version": "1.0.0",
    "description": "<p>Ruta para obtener todas las modulaciones.</p>",
    "name": "All",
    "group": "Modulation",
    "permission": [
      {
        "name": "none"
      }
    ],
    "filename": "app/Http/routes.php",
    "groupTitle": "Modulation"
  },
  {
    "type": "get",
    "url": "/radio",
    "title": "Listar",
    "version": "1.0.0",
    "description": "<p>Ruta para obtener todas las radios.</p>",
    "name": "All",
    "group": "Radio",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "count",
            "description": "<p>Especifica el número de radios para tratar de recuperar.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Ejemplo de respuesta",
          "content": "{\n\t\"id\": 1\n\t\"state_id\": 1\n\t\"city_id\": 1\n\t\"modulation_id\": 1\n\t\"state\": \"Chaco\"\n\t\"city\": \"Resistencia\"\n\t\"modulation\": \"AM\"\n\t\"name\": \"Radio Marz\"\n\t\"frequency\": 100.9\n\t\"streaming\": \"http://marz.dev:8000/streaming\"\n\t\"active\": 1\n\t\"created_at\": \"2016-04-13 20:03:25\"\n\t\"updated_at\": \"2016-04-13 20:03:25\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/routes.php",
    "groupTitle": "Radio"
  },
  {
    "type": "post",
    "url": "/radio",
    "title": "Agregar",
    "version": "1.0.0",
    "description": "<p>Ruta para agregar una radio nueva.</p>",
    "name": "Create",
    "group": "Radio",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nombre de la radio.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "streaming",
            "description": "<p>URL Dirección del streaming de audio.</p>"
          }
        ]
      }
    },
    "filename": "app/Http/routes.php",
    "groupTitle": "Radio"
  },
  {
    "type": "delete",
    "url": "/radio/:id",
    "title": "Eliminar",
    "version": "1.0.0",
    "description": "<p>Ruta para eliminar una radio.</p>",
    "name": "Destroy",
    "group": "Radio",
    "permission": [
      {
        "name": "admin"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Identificador único de la radio.</p>"
          }
        ]
      }
    },
    "filename": "app/Http/routes.php",
    "groupTitle": "Radio"
  },
  {
    "type": "search",
    "url": "/radio/search/",
    "title": "Buscar",
    "version": "1.0.0",
    "description": "<p>Ruta para buscar una radio.</p>",
    "name": "Search",
    "group": "Radio",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "q",
            "description": "<p>Nombre de la radio a buscar.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "count",
            "description": "<p>Especifica el número de radios para tratar de recuperar.</p>"
          }
        ]
      }
    },
    "filename": "app/Http/routes.php",
    "groupTitle": "Radio"
  },
  {
    "type": "get",
    "url": "/radio/:id",
    "title": "Ver",
    "version": "1.0.0",
    "description": "<p>Ruta para ver la información de una radio.</p>",
    "name": "Show",
    "group": "Radio",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Identificador único de la radio.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Identificador único de la radio.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "modulation",
            "description": "<p>Modulación de la radio (AM, FM o AM-FM).</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nombre de la radio.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "streaming",
            "description": "<p>URL de transmisión de la radio.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "frequency",
            "description": "<p>Número de la frecuencia (Mhz).</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Ejemplo de respuesta",
          "content": "{\n\t\"id\": 1\n\t\"state_id\": 1\n\t\"city_id\": 1\n\t\"modulation_id\": 1\n\t\"state\": \"Chaco\"\n\t\"city\": \"Resistencia\"\n\t\"modulation\": \"AM\"\n\t\"name\": \"Radio Marz\"\n\t\"frequency\": 100.9\n\t\"streaming\": \"http://marz.dev:8000/streaming\"\n\t\"active\": 1\n\t\"created_at\": \"2016-04-13 20:03:25\"\n\t\"updated_at\": \"2016-04-13 20:03:25\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/routes.php",
    "groupTitle": "Radio"
  },
  {
    "type": "put",
    "url": "/radio/:id",
    "title": "Actualiar",
    "version": "1.0.0",
    "description": "<p>Ruta para editar la información de una radio.</p>",
    "name": "Update",
    "group": "Radio",
    "permission": [
      {
        "name": "admin"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Identificador único de la radio.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nombre de la radio.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "streaming",
            "description": "<p>Dirección del streaming de audio.</p>"
          }
        ]
      }
    },
    "filename": "app/Http/routes.php",
    "groupTitle": "Radio"
  },
  {
    "type": "get",
    "url": "/state",
    "title": "Listar",
    "version": "1.0.0",
    "description": "<p>Ruta para obtener todas las provincias.</p>",
    "name": "All",
    "group": "State",
    "permission": [
      {
        "name": "none"
      }
    ],
    "filename": "app/Http/routes.php",
    "groupTitle": "State"
  },
  {
    "type": "get",
    "url": "/state/:id/cities",
    "title": "Listar ciudades",
    "version": "1.0.0",
    "description": "<p>Obtener todas las ciudades de una provincia.</p>",
    "name": "Cities",
    "group": "State",
    "permission": [
      {
        "name": "none"
      }
    ],
    "filename": "app/Http/routes.php",
    "groupTitle": "State"
  }
] });
