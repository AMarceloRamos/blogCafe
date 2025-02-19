import express from "express";
import fs from "fs";
import mammoth from "mammoth";

const app = express();
const PORT = 3000;

// Endpoint para leer el archivo Word
app.get("/api/contenido", async (req, res) => {
    try {
        // Leer el archivo .docx
        const data = fs.readFileSync("contenido.docx");

        // Convertir a texto con Mammoth
        const result = await mammoth.extractRawText({ buffer: data });

        res.json({ contenido: result.value });
    } catch (error) {
        res.status(500).json({ error: "No se pudo leer el archivo" });
    }
});

app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
