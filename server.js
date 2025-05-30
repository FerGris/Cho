const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Configura el transporter de Nodemailer
const transporter = nodemailer.createTransport({
    service: 'gmail', // o el servicio de correo que uses
    auth: {
        user: 'tu_correo@gmail.com', // tu correo
        pass: 'tu_contraseña' // tu contraseña (puedes usar App Passwords si tienes activada la verificación en dos pasos)
    }
});

// Ruta para enviar el ticket
app.post('/send-ticket', (req, res) => {
    const { producto, precio, cantidad, correo } = req.body;
    const total = precio * cantidad;

    const mailOptions = {
        from: 'tu_correo@gmail.com',
        to: correo,
        subject: 'Ticket de Compra',
        text: `Gracias por tu compra!\n\nProducto: ${producto}\nCantidad: ${cantidad}\nPrecio: $${precio}\nTotal: $${total}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return res.status(500).send('Error al enviar el ticket');
        }
        res.status(200).send('Ticket enviado con éxito');
    });
});

// Inicia el servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
