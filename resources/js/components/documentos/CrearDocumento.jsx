import React, {useState, useEffect} from 'react';
import axios from 'axios';

function CrearDocumento() {
    const [procesos, setProcesos] = useState([]);
    const [tipos, setTipos] = useState([]);
    const [doc_nombre, setNombre] = useState('');
    const [doc_contenido, setContenido] = useState('');
    const [doc_id_proceso, setIdProceso] = useState('');
    const [doc_id_tipo, setIdTipo] = useState('');
    const [errors, setErrors] = useState([]);

    useEffect(() => {
        getProcesos();
        getTipos();
    }, []);

    const getProcesos = async () => {
        const response = await axios.get('/procesos');
        setProcesos(response.data);
        console.log(response.data);
    };

    const getTipos = async () => {
        const response = await axios.get('/tipos');
        setTipos(response.data);
        console.log(response.data);
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            const response = await axios.post('/guardar-documento', {
                doc_nombre,
                doc_contenido,
                doc_id_proceso,
                doc_id_tipo,
            });
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
                    <input type="text" id="doc_nombre" name="doc_nombre" value={doc_nombre} onChange={(event) => setNombre(event.target.value)} />
                </div>
                <div className="cd-divP">
                    <label htmlFor="doc_contenido">Contenido</label>
                    <textarea id="doc_contenido" name="doc_contenido" value={doc_contenido} onChange={(event) => setContenido(event.target.value)}></textarea>
                </div>
                <div className="cd-divP">
                <label>Proceso</label>
                <select value={doc_id_proceso} onChange={(event) => setIdProceso(event.target.value)} style={marginS}>
                    <option value="">Seleccione un proceso</option>
                    {procesos.map(proceso => (
                        <option key={proceso.pro_id} value={proceso.pro_id}>{proceso.pro_nombre}</option>
                    ))}
                </select>
                </div>
                <div className="cd-divP">
                <label>Tipo</label>
                <select value={doc_id_tipo} onChange={(event) => setIdTipo(event.target.value)} style={marginT}>
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

export default CrearDocumento;

