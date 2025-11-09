# 📝 Mini Blog

Un pequeño pero potente **sistema de gestión de artículos (CRUD)** desarrollado en **PHP con PDO y MySQL**, con un diseño moderno usando **Tailwind CSS** y una experiencia de usuario mejorada mediante **SweetAlert2**.  

Este proyecto demuestra buenas prácticas, seguridad, validaciones y confirmaciones visuales para una gestión limpia, ordenada y profesional de contenido.

---

## 🚀 Características principales

✅ CRUD completo de artículos (crear, listar, editar y eliminar).  
✅ Confirmaciones visuales con SweetAlert2 para todas las acciones.  
✅ Validaciones tanto del lado del cliente como del servidor.  
✅ Diseño limpio y moderno con Tailwind CSS.  
✅ Estructura modular y escalable (PHP puro con includes organizados).  
✅ Conexión segura mediante PDO y consultas preparadas.  
✅ Mensajes de éxito y error unificados en un solo archivo.

---

## 🧩 Tecnologías utilizadas

| Tecnología / Herramienta | Uso principal |
|---------------------------|----------------|
| **PHP 8+** | Lenguaje backend principal |
| **PDO (PHP Data Objects)** | Conexión segura a base de datos |
| **MySQL / MariaDB** | Motor de base de datos |
| **Tailwind CSS** | Diseño y estilos |
| **JavaScript (SweetAlert2)** | Alertas y confirmaciones interactivas |
| **Laragon / XAMPP / WAMP** | Entorno local de desarrollo |

---

## 🗃️ Base de datos

**Nombre de la base de datos:** `mini_blog`  
**Tabla principal:** `articulos`

```sql
CREATE TABLE articulos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  contenido TEXT NOT NULL,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

---