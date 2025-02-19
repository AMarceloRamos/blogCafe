import express from "express";
// import fs from "fs";
import cors from "cors";


const app = express();
app.use(cors());



app.use(express.static("public"));


const PORT = 3002;


//Datos simulados por le café

const articulos = [

    {
        id: 1,
        imagen: "/img/granosCafe.png",
        titulo: "Tipos de granos de Café",
        introduccion: "Al igual que con el vino, elegir el grano correcto depende de su paleta. Eso es porque los granos de café tienen diferentes características de sabor según la parte del mundo en que se cultiven. La altitud, la temperatura y el suelo, incluso la cosecha, también desempeñan un papel importante. Mientras tostar los granos de café produce aún más notas y matices de sabor. Arábica Considerados el champán del café, los granos de Arabica tienen una asombrosa riqueza aromática que produce un sabor suave y profundo al mismo tiempo.",
        contenido: " Arábica: La Elegancia en Cada Sorbo\n El grano de café Arábica es el más cultivado en el mundo y representa alrededor del 60-70 % de la producción global.Se caracteriza por su sabor suave, notas afrutadas y una acidez equilibrada.Ideal para quienes buscan una experiencia delicada y aromática.\nRobusta: Intensidad y Cuerpo\n Más fuerte y con mayor contenido de cafeína, el grano Robusta es perfecto para quienes disfrutan un café con carácter.Su sabor es más amargo, con notas terrosas y un cuerpo más pesado, lo que lo hace ideal para un espresso potente o mezclas con Arábica.\nLiberica: Exótico y Aromático\nMenos conocido pero igual de interesante, el café Liberica tiene granos más grandes y un perfil de sabor único, con toques florales y un ligero ahumado.Se cultiva en menor cantidad, principalmente en Filipinas y Malasia.</br>Excelsa: Complejidad y Profundidad\nUna joya rara dentro del mundo del café, el Excelsa aporta acidez brillante y notas afrutadas con un toque especiado.A menudo se mezcla con otros granos para darle mayor complejidad a la bebida.\nCada grano de café tiene su personalidad y encanto, ofreciendo experiencias sensoriales distintas.La próxima vez que tomes una taza, piensa en el viaje que han recorrido esos pequeños granos hasta llegar a ti. ☕🌍"


    },
    {
        id: 2,
        imagen: "/img/ColdBrew.png",
        titulo: "3 deliciosas recetas de café",
        introduccion: "Hoy te compartimos tres recetas irresistibles que puedes preparar fácilmente en casa para llevar tu experiencia cafetera al siguiente nivel. Ya sea que prefieras un toque dulce, cremoso o refrescante, estas opciones te harán redescubrir el placer de una buena taza de café.",
        contenido: "Cold Brew Con Naranja..."
    },
    {
        id: 3,
        imagen: "/img/blog3.jpg",
        titulo: "Beneficios del café",
        introduccion: "El café puede tener varios beneficios para la salud, como ayudar a mantener la memoria, reducir el riesgo de diabetes, y mejorar el estado de ánimo.Sin embargo, el café también puede tener efectos negativos, como aumentar la presión arterial, interferir con la absorción de calcio y provocar acidez "

    }


];

// EndPoint para obetener los granos de Café


app.get("/api/articulos", (req, res) => {
    res.json(articulos);

});

// ✅ Ruta para obtener un artículo específico por su ID
app.get("/api/articulos/:id", (req, res) => {
    const id = parseInt(req.params.id);
    const articulo = articulos.find(a => a.id === id);

    if (articulo) {
        res.json(articulo);
    } else {
        res.status(404).json({ mensaje: "Artículo no encontrado" });
    }
});

app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});

console.log(articulos); // Verifica qué campos devuelve la API
