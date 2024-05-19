import React, {useState} from 'react';
import ReactDOM from 'react-dom/client';
import axios from 'axios';

function Login() {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [errors, setErrors] = useState([]);

    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            const response = await axios.post('/login', {
                username,
                password,  
            });
            window.location.href = '/home';
        } catch (error) {
            if(error.response){
                setErrors(error.response.data.errors);
            }else {
                console.log(error);
            }
        }
    }

    const margen = {
        marginTop: '12px'
    };

    const detalle = {
        marginLeft: '28px'
    }
    return (
        <div className='fondo'>
            <div className='contenedor'>
                <div className='cabecera'>
                    <h2 className='titulo1'>Iniciar sesión</h2>
                </div>
                <form className='esp1' onSubmit={handleSubmit}>
                {errors.length > 0 && (
                    <div>
                        <ul>
                            {errors.map((error,index) => ( <li key={index}>{error}</li>))}
                        </ul>
                    </div>
                )}
                    <div className='esp2'>
                        <label className='label1'>Usuario</label>
                        <input type='text' name='username' id='username' style={detalle} className='input1' value={username} onChange={(event) => setUsername(event.target.value)}/>
                    </div>
                    <div className='esp2'>
                        <label className='label1'>Contraseña</label>
                        <input type='password' name='password' id='password' className='input1' value={password} onChange={(event) => setPassword(event.target.value)}/>
                    </div>
                    <button type='submit' className='btnLogin' style={margen}>Ingresar</button>
                </form>
            </div>
        </div>
    );
}

export default Login;
