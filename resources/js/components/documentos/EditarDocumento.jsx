import React, {useState, useEffect} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom/client';
import { useParams } from 'react-router-dom';

function EditarDocumento() {
    const { id } = useParams();
    const [procesos, setProcesos] = useState([]);
    const [tipos, setTipos] = useState([]);
    const [documento, setDocumento] = useState({
        doc_id: '',
        doc_nombre: '',
        doc_contenido: '',
        doc_id_proceso: '',
        doc_id_tipo: '',
    });
    const [errors, setErrors] = useState([]);

    useEffect(() => {
        obtenerDocumento(id);
        getProcesos();
        getTipos();
    }, [id]);

    const obtenerDocumento = async (id) => {
        try {
            const response = await axios.get(`/documento/${id}`);
            setDocumento(response.data);
        } catch (error) {
            console.log(error);
        }
    };

    const getProcesos = async () => {
        const response = await axios.get('/procesos');
        setProcesos(response.data);
    };

    const getTipos = async () => {
        const response = await axios.get('/tipos');
        setTipos(response.data);
    };

    const handleChange = (event) => {
        const {name,value} = event.target;
        setDocumento({
            ...documento,
            [name]: value
        })
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            const response = await axios.put(`/editar-documento/${id}`, documento);
            if (response.data.success) {
                window.location.href = '/home';
            }else {
                console.log(response.data.error);
                
            }
        } catch (error) {
            if(error.response){
                setErrors(error.response.data.errors);
            }else {
                console.log(error);
            }
        }
    };

    const marginR = {
        marginRight: '19px'
    };

    const marginS = {
        marginLeft: '20px'
    };

    const marginT = {
        marginLeft: '52px'
    };

    return (
        <div className="cd-contenedor">
            <h1>Nuevo documento</h1>
            <form onSubmit={handleSubmit}>
                <div className="cd-divP">
                    <label htmlFor="doc_nombre" style={marginR}>Nombre</label>
                    <input type="text" id="doc_nombre" name="doc_nombre" value={documento.doc_nombre} onChange={handleChange} />
                </div>
                <div className="cd-divP">
                    <label htmlFor="doc_contenido">Contenido</label>
                    <textarea id="doc_contenido" name="doc_contenido" value={documento.doc_contenido} onChange={handleChange}></textarea>
                </div>
                <div className="cd-divP">
                    <label>Proceso</label>
                    <select name='doc_id_proceso' value={documento.doc_id_proceso} onChange={handleChange} style={marginS}>
                        <option value="">Seleccione un proceso</option>
                        {procesos.map(proceso => (
                            <option key={proceso.pro_id} value={proceso.pro_id}>{proceso.pro_nombre}</option>
                        ))}
                    </select>
                </div>
                <div className="cd-divP">
                    <label>Tipo</label>
                    <select name='doc_id_tipo' value={documento.doc_id_tipo} onChange={handleChange} style={marginT}>
                        <option value="">Seleccione un tipo</option>
                        {tipos.map(tipo => (
                            <option key={tipo.tip_id} value={tipo.tip_id}>{tipo.tip_nombre}</option>
                        ))}
                    </select>
                </div>
                <div className="cd-divP">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    );
}

export default EditarDocumento;


