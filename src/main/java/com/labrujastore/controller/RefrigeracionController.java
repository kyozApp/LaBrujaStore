package com.labrujastore.controller;

import java.io.IOException;
import java.util.List;
import java.util.ArrayList;
import java.util.Collection;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import com.labrujastore.entity.Atributos;
import com.labrujastore.entity.Categoria;
import com.labrujastore.entity.Marca;
import com.labrujastore.entity.Refrigeracion;
import com.labrujastore.service.AtributosService;
import com.labrujastore.service.CategoriaService;
import com.labrujastore.service.MarcaService;
import com.labrujastore.service.RefrigeracionService;

import jakarta.servlet.http.HttpServletRequest;

@Controller
@RequestMapping("/admin")
public class RefrigeracionController {

    @Autowired
    private RefrigeracionService refrigeracionService;

    @Autowired
    private CategoriaService categoriaService;

    @Autowired
    private AtributosService atributoService;

    @Autowired
    private MarcaService marcaService;

    @GetMapping("/refrigeracion")
    public String index(Model model) {
        List<Refrigeracion> refrigeraciones = refrigeracionService.listarRefrigeracion();
        model.addAttribute("tablaRefrigeracion", refrigeraciones);
        return "admin/refrigeracion/index";
    }

    @GetMapping("/refrigeracion/crear")
    public String crear(Model model) {
        Refrigeracion refrigeracion = new Refrigeracion();
        List<Categoria> categorias = categoriaService.listarCategoria();
        model.addAttribute("formularioCrearRefrigeracion", refrigeracion);
        model.addAttribute("selectorCategorias", categorias);
        
        List<Marca> marcas = marcaService.listarMarca();
        model.addAttribute("selectorMarcas", marcas);
        return "admin/refrigeracion/crear";
    }

    @PostMapping("/refrigeracion/crear")
    public String crear(@ModelAttribute Refrigeracion refrigeracion,
            @RequestParam("imagen") MultipartFile imagen) throws IOException {
        refrigeracion.setImagenNombre(imagen.getOriginalFilename());
        refrigeracion.setImagenArchivo(imagen.getBytes());
        refrigeracionService.guardarRefrigeracion(refrigeracion);
        return "redirect:/admin/refrigeracion";
    }

    @GetMapping("/refrigeracion/editar/{refrigeracionId}")
    public String editar(@PathVariable Integer refrigeracionId, Model model) {
        Refrigeracion refrigeracion = refrigeracionService.obtenerIdRefrigeracion(refrigeracionId);
        List<Categoria> categorias = categoriaService.listarCategoria();
        model.addAttribute("refrigeracion", refrigeracion);
        model.addAttribute("selectorCategorias", categorias);
        
        List<Marca> marcas = marcaService.listarMarca();
        model.addAttribute("selectorMarcas", marcas);
        return "admin/refrigeracion/editar";
    }

    @PostMapping("/refrigeracion/editar/{refrigeracionId}")
    public String editar(@PathVariable Integer refrigeracionId, @ModelAttribute Refrigeracion refrigeracion,
            @RequestParam("imagen") MultipartFile imagen,
            @RequestParam("stock") Integer stock,
            @RequestParam("stock_lima") String stock_lima,
            @RequestParam("stock_arequipa") String stock_arequipa,
            @RequestParam("precio") Double precio,
            @RequestParam("descripcion") String descripcion,
            @RequestParam("url") String url,
            @RequestParam("estado") String estado,
            @RequestParam("categoriaId") Integer categoriaId,
            @RequestParam("marcaId") Integer marcaId)
            throws IOException {
        Refrigeracion refrigeracionExistente = refrigeracionService.obtenerIdRefrigeracion(refrigeracionId);
        refrigeracionExistente.setNombre(refrigeracion.getNombre());
        refrigeracionExistente.setStock(stock);
        refrigeracionExistente.setStock_lima(stock_lima);
        refrigeracionExistente.setStock_arequipa(stock_arequipa);
        refrigeracionExistente.setPrecio(precio);
        refrigeracionExistente.setDescripcion(descripcion);
        refrigeracionExistente.setUrl(url);
        refrigeracionExistente.setEstado(estado);
        refrigeracionExistente.setCategoria(categoriaService.obtenerIdCategoria(categoriaId));
        refrigeracionExistente.setMarca(marcaService.obtenerIdMarca(marcaId));

        if (!imagen.isEmpty()) {
            refrigeracionExistente.setImagenNombre(imagen.getOriginalFilename());
            refrigeracionExistente.setImagenArchivo(imagen.getBytes());
        }
        refrigeracionService.guardarRefrigeracion(refrigeracionExistente);
        return "redirect:/admin/refrigeracion";
    }

    @GetMapping("/refrigeracion/{refrigeracionId}")
    public String eliminar(@PathVariable Integer refrigeracionId) {
        refrigeracionService.eliminarRefrigeracion(refrigeracionId);
        return "redirect:/admin/refrigeracion";
    }

    // ATRIBUTOS
    @GetMapping("/refrigeracion/atributos/{productoId}")
    public String atributos_GET(Model model, @PathVariable Integer productoId) {

        // CARGA EL FORMULARIO
        Atributos atributo = new Atributos();
        model.addAttribute("formularioAtributo", atributo);

        List<Atributos> todos_atributos = atributoService.listarAtributos();
        Collection<Atributos> atributos_tabla = new ArrayList<>();
        for (Atributos atributo_u : todos_atributos) {
            if (atributo_u.getRefrigeracion() != null && atributo_u.getRefrigeracion().getRefrigeracionId() != null &&
                    atributo_u.getRefrigeracion().getRefrigeracionId() == productoId) {
                atributos_tabla.add(atributo_u);
            }
        }

        model.addAttribute("tablaAtributos", atributos_tabla);
        model.addAttribute("categoria", "refrigeracion");

        return "admin/atributo/index";
    }

    @PostMapping("/refrigeracion/atributos/{productoId}")
    public String atributos_POST(Model model, @ModelAttribute("formularioAtributo") Atributos atributo_p,
            @PathVariable Integer productoId) throws IOException {

        // PARA AGREGAR UN NUEVO ATRIBUTO
        Refrigeracion refrigeracion = refrigeracionService.obtenerIdRefrigeracion(productoId);
        atributo_p.setRefrigeracion(refrigeracion);
        atributoService.guardarAtributos(atributo_p);

        return "redirect:/admin/refrigeracion/atributos/{productoId}";
    }

    @GetMapping("/refrigeracion/atributos/editar/{atributoId}")
    public String atributo_editar_GET(Model model, @PathVariable Integer atributoId) {

        Atributos atributo = atributoService.obtenerIdAtributos(atributoId);
        model.addAttribute("atributo", atributo);

        model.addAttribute("categoria", "refrigeracion");
        model.addAttribute("categoriaId", atributo.getRefrigeracion().getRefrigeracionId());

        return "admin/atributo/editar";
    }

    @PostMapping("/refrigeracion/atributos/editar/{atributoId}")
    public String atributo_editar_POST(
            @PathVariable Integer atributoId,
            @ModelAttribute("atrubto") Atributos atributo_p,
            Model model) {

        Atributos atributoExistente = atributoService.obtenerIdAtributos(atributoId);
        atributoExistente.setTitulo(atributo_p.getTitulo());
        atributoExistente.setContenido(atributo_p.getContenido());
        atributoService.actualizarAtributos(atributoExistente);

        return "redirect:/admin/refrigeracion/atributos/" + atributoExistente.getRefrigeracion().getRefrigeracionId();
    }

    @GetMapping("/refrigeracion/atributos/eliminar/{atributoId}")
    public String atributo_eliminar_GET(@PathVariable Integer atributoId, HttpServletRequest request) {
        atributoService.eliminarAtributos(atributoId);

        String referer = request.getHeader("Referer");
        return "redirect:" + referer;
    }
}
