import axios from "axios";
import React, { useState, useEffect /*, useRef */ } from "react";
import { useNavigate } from "react-router-dom";

var fecha_Actual = new Date()
var fecha_ISO = fecha_Actual.toISOString().split("T", 1)
/* Fecha Actual pasa a ser la de hace 1 año */
fecha_Actual.setFullYear(fecha_Actual.getFullYear() - 1)
var fecha_ISOPasado = fecha_Actual.toISOString().split("T", 1)

const endpoint = 'http://localhost:8000/api/asistencia'

const CreateAsistencia = () => {

  const [Tematicas, setTematicas] = useState([])
  const [Fichas, setFichas] = useState([])
  const [Ficha, setFicha] = useState([])
  const [erroresAxio, setErroresAxio] = useState("");
  const [fechaAsistencia, setfechaAsistencia] = useState('')
  const [idTematica, setidTematica] = useState("")

  const navigate = useNavigate()

  const getAllTematicaAprendiz = async () => {
    const response = await axios.get(`${endpoint}/create`)
    setTematicas(response.data[0])
    setFichas(response.data[2])
  }
  const Store = async (e) => {
    e.preventDefault()
    const response = await axios.get(`${endpoint}/store`)
    await axios.post(`${endpoint}/store`, {
      fechaAsistencia: fechaAsistencia,
      id_ficha: Ficha,
      id_tematica: idTematica
    })
      .then(() => {
        navigate('/')
      })
      .catch(function (error) {
        setErroresAxio(error.response.data.errors)
        let errores = error.response.data.errors
        console.log(errores)
        if (errores.fechaAsistencia != undefined) {
          document.getElementById("fechaError").classList.remove('d-none')
        }
        else {
          document.getElementById("fechaError").classList.add('d-none')
        }
        if (errores.id_tematica != undefined) {
          document.getElementById("tematicaError").classList.remove('d-none')
        }
        else {
          document.getElementById("tematicaError").classList.add('d-none')
        }
        if (errores.ficha != undefined) {
          document.getElementById("fichaError").classList.remove('d-none')
        }
        else {
          document.getElementById("fichaError").classList.add('d-none')
        }
      })
  }
  var div = <div className="alert alert-danger"></div>
console.log(erroresAxio)
  useEffect(() => {
    getAllTematicaAprendiz()
  }, [])
  return (
    <>
    <nav className="navbar text-uppercase navbar-expand-md  bg-dark">
  <div className="container-fluid">
    <a className="navbar-brand" href="">
        <img src="{{ url('img/logo.png')}}" className="d-inline-block align-top" alt="logo"/>
    </a>
    <button className="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span className="navbar-toggler-icon"></span>
    </button>
    <div className="collapse navbar-collapse" id="navbarNav">
      <ul className="navbar-nav navbar-right ms-auto  mb-2 mb-lg-0">
        <li className="nav-item">
          <a className="nav-link navbar-brand text-white " aria-current="page" href='/'><i className="bi bi-unindent"> Atras</i></a>
        </li>
    </ul>
    </div>
  </div>
</nav>
    <div>
      <h1 className="mt-3 mb-5">Selecione Una Fecha Expecifica</h1>
      <form onSubmit={Store}>
        <div className="row">
          <div className="col">
            <label className="form-label mt-5 mb-3">Fecha:</label>
            <input className="form-control" placeholder="Fecha" autoFocus
              min={fecha_ISOPasado}
              max={fecha_ISO}
              value={fechaAsistencia}
              onChange={(e) => setfechaAsistencia(e.target.value)}
              type='date' />
            <div className="alert alert-danger d-none" id="fechaError">{erroresAxio.fechaAsistencia}</div>
          </div>
        </div>
        <div className="row">
          <div className="col">
            <label className="form-label mt-5 mb-3">Ficha:</label>
            <select type='select' onChange={(e) => setFicha(e.target.value)} className="form-control">
              <option value="">Selecciona una Ficha</option>
              {Fichas.map((Ficha) => (
                <option key={Ficha.id} value={Ficha.id}>{Ficha.numFicha}</option>
              ))}
            </select>
            <div className="alert alert-danger d-none" id="fichaError">{erroresAxio.ficha}</div>
          </div>
        </div>
  <div className="row">
    <div className="col">
      <label className="col-sm-2 col-form-label mt-4 mb-3">Tematica:</label>
          <select type='select' onChange={(e) => setidTematica(e.target.value)} className="form-control">
            <option value="">Selecciona una tematica</option>
            {Tematicas.map((Tematica) => (
              <option key={Tematica.id} value={Tematica.id}>{Tematica.nombreTematica}</option>
            ))}
          </select>
          <div className="alert alert-danger d-none" id="tematicaError">{erroresAxio.id_tematica}</div>
    </div>
  </div>
        <button type="submit" className="btn btn-primary mt-5 mb-3">Crear</button>
      </form>
    </div></>
  )
}
export default CreateAsistencia