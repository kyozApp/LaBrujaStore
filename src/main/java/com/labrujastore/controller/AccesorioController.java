package com.labrujastore.controller;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestPart;
import org.springframework.web.multipart.MultipartFile;

import com.labrujastore.entity.Accesorio;
import com.labrujastore.entity.Categoria;
import com.labrujastore.service.AccesorioService;
import com.labrujastore.service.CategoriaService;

@Controller
@RequestMapping("/admin")
public class AccesorioController {
	
    private static String storageLocation = "src/main/resources/static/admin/accesorio";

    @Autowired
    private AccesorioService accesorioService;

    @Autowired
    private CategoriaService categoriaService;

    @GetMapping("/accesorio")
    public String index(Model model) {
        List<Accesorio> accesorios = accesorioService.listarAccesorio();
        for (Accesorio accesorio : accesorios) {
            accesorio.setImagenArchivo("http://localhost:8080//admin/accesorio/" + accesorio.getImagenNombre());
        }
        model.addAttribute("tablaAccesorio", accesorios);
        return "admin/accesorio/index";
    }

    @GetMapping("/accesorio/crear")
    public String crear(Model model) {
        Accesorio accesorio = new Accesorio();
        List<Categoria> categorias = categoriaService.listarCategoria();
        model.addAttribute("formularioCrearAccesorio", accesorio);
        model.addAttribute("selectorCategorias", categorias);
        return "admin/accesorio/crear";
    }

    @PostMapping("/accesorio/crear")
    public String crear(@ModelAttribute("formularioCrearAccesorio") Accesorio accesorio,
            @RequestPart("imagen") MultipartFile imagen) {
        try {
            // Generar un nombre único para el archivo de imagen
            String imagenNombre = generarNombreUnico(imagen.getOriginalFilename());

            // Establecer el nombre de la imagen en el accesorio
            accesorio.setImagenNombre(imagenNombre);

            // Obtener la ruta del archivo donde se almacenará la imagen
            Path filePath = Paths.get(storageLocation + "/" + imagenNombre);

            // Copiar los bytes de la imagen al archivo en el sistema de archivos
            Files.copy(imagen.getInputStream(), filePath);

            // Construir la URL de la imagen
            String imageUrl = "http://localhost:8080//admin/accesorio/" + imagenNombre;

            // Establecer la URL de la imagen en el accesorio
            accesorio.setImagenArchivo(imageUrl);

            // Guardar el accesorio en la base de datos
            accesorioService.guardarAccesorio(accesorio);
        } catch (IOException e) {
            e.printStackTrace();
        }
        return "redirect:/admin/accesorio";
    }

    @GetMapping("/accesorio/editar/{accesorioId}")
    public String editar(@PathVariable Integer accesorioId, Model model) {
        List<Categoria> categorias = categoriaService.listarCategoria();
        model.addAttribute("formularioEditarAccesorio", accesorioService.obtenerIdAccesorio(accesorioId));
        model.addAttribute("selectorCategorias", categorias);
        return "admin/accesorio/editar";
    }

    @PostMapping("/accesorio/editar/{accesorioId}")
    public String editar(@PathVariable Integer accesorioId,
            @ModelAttribute("formularioEditarAccesorio") Accesorio accesorio,
            @RequestPart("imagen") MultipartFile imagen) {
        try {
            Accesorio accesorioAnterior = accesorioService.obtenerIdAccesorio(accesorioId);

            // Verificar si se ha proporcionado una nueva imagen
            if (!imagen.isEmpty()) {
                // Eliminar la imagen anterior
                eliminarImagen(accesorioAnterior.getImagenNombre());

                // Generar un nombre único para el archivo de imagen
                String imagenNombre = generarNombreUnico(imagen.getOriginalFilename());

                // Establecer el nombre de la nueva imagen en el accesorio
                accesorio.setImagenNombre(imagenNombre);

                // Obtener la ruta del archivo donde se almacenará la nueva imagen
                Path filePath = Paths.get(storageLocation + "/" + imagenNombre);

                // Copiar los bytes de la imagen al archivo en el sistema de archivos
                Files.copy(imagen.getInputStream(), filePath);

                // Construir la URL de la nueva imagen
                String imageUrl = "http://localhost:8080//admin/accesorio/" + imagenNombre;

                // Establecer la URL de la nueva imagen en el accesorio
                accesorio.setImagenArchivo(imageUrl);
            } else {
                // Si no se proporciona una nueva imagen, mantener la imagen anterior
                accesorio.setImagenNombre(accesorioAnterior.getImagenNombre());
                accesorio.setImagenArchivo(accesorioAnterior.getImagenArchivo());
            }

            // Actualizar el accesorio en la base de datos
            accesorioService.actualizarAccesorio(accesorio);
        } catch (IOException e) {
            e.printStackTrace();
        }
        return "redirect:/admin/accesorio";
    }

    @GetMapping("/accesorio/{accesorioId}")
    public String eliminar(@PathVariable Integer accesorioId) {
        Accesorio accesorio = accesorioService.obtenerIdAccesorio(accesorioId);
        
        // Eliminar la imagen asociada al accesorio
        eliminarImagen(accesorio.getImagenNombre());
        
        // Eliminar el accesorio de la base de datos
        accesorioService.eliminarAccesorio(accesorioId);
        
        return "redirect:/admin/accesorio";
    }


    // Método para generar un nombre único para el archivo de imagen
    private String generarNombreUnico(String nombreOriginal) {
        String[] partesNombre = nombreOriginal.split("\\.");
        String extension = partesNombre[partesNombre.length - 1];
        String nombreBase = partesNombre[0];
        String timestamp = Long.toString(System.currentTimeMillis());
        return nombreBase + "_" + timestamp + "." + extension;
    }

    // Método para eliminar la imagen anterior
    private void eliminarImagen(String nombreImagen) {
        if (nombreImagen != null && !nombreImagen.isEmpty()) {
            Path imagePath = Paths.get(storageLocation + "/" + nombreImagen);
            try {
                Files.deleteIfExists(imagePath);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}
