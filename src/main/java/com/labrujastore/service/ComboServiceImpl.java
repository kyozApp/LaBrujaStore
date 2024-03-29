package com.labrujastore.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.labrujastore.entity.Combo;
import com.labrujastore.repository.ComboRepository;

@Service
public class ComboServiceImpl implements ComboService {

    @Autowired
    private ComboRepository comboRepository;

    @SuppressWarnings("null")
    @Override
    public Combo actualizarCombo(Combo combo) {
        return comboRepository.save(combo);
    }

    @SuppressWarnings("null")
    @Override
    public void eliminarCombo(Integer comboId) {
        comboRepository.deleteById(comboId);
    }

    @SuppressWarnings("null")
    @Override
    public Combo guardarCombo(Combo combo) {
        return comboRepository.save(combo);
    }

    @Override
    public List<Combo> listarCombo() {
        return comboRepository.findAll();
    }

    @SuppressWarnings("null")
    @Override
    public Combo obtenerIdCombo(Integer comboId) {
        return comboRepository.findById(comboId).get();
    }

}
