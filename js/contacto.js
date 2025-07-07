import React, { useState } from 'react';
import { Alert } from '@/components/ui/alert';

const ContactPage = () => {
  const [formData, setFormData] = useState({
    nombre: '',
    apellido: '',
    email: '',
    direccion: '',
    telefono: '',
    comentarios: '',
    aceptaTerminos: false
  });

  const [submitted, setSubmitted] = useState(false);

  const locations = [
    { name: 'BELLO', phone: '3118080092' },
    { name: 'NEIVA', phone: '3118080091' },
    { name: 'HAYUELOS', phone: '3202325689' },
    { name: 'BULEVAR', phone: '3208587729' },
    { name: 'ALTAVISTA', phone: '3202325661' },
    { name: 'MOSQUERA', phone: '3112470566' },
    { name: 'CALI', phone: '3118080084' },
    { name: 'PASEO DEL RÍO', phone: '3102326520' },
    { name: 'MAYORCA', phone: '3118080092' },
  ];

  const handleSubmit = (e) => {
    e.preventDefault();
    setSubmitted(true);
    // Aquí iría la lógica de envío del formulario
  };

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }));
  };

  return (
    <div className="min-h-screen bg-indigo-950 relative overflow-hidden py-16">
      {/* Background effect */}
      <div className="absolute inset-0">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjRkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+PC9nPjwvc3ZnPg==')] bg-repeat opacity-30" />
      </div>

      <div className="relative container mx-auto px-4">
        {/* Header */}
        <div className="text-center mb-16">
          <h1 className="text-4xl font-bold text-white mb-4">CONTACTO</h1>
          <div className="w-32 h-1 bg-blue-400 mx-auto"/>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
          {/* Contact Information */}
          <div className="bg-indigo-900/50 backdrop-blur-sm rounded-2xl border border-blue-400/30 p-8">
            <div className="relative">
              {/* Holographic display effect */}
              <div className="absolute -inset-1 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-lg blur" />
              
              <div className="relative bg-indigo-950/80 rounded-xl p-6 space-y-6">
                <h2 className="text-2xl font-bold text-blue-400 mb-6">Nuestras Sedes</h2>
                
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                  {locations.map((location) => (
                    <div 
                      key={location.name}
                      className="bg-indigo-900/50 rounded-lg p-4 border border-blue-400/20"
                    >
                      <h3 className="text-white font-bold mb-2">{location.name}</h3>
                      <p className="text-blue-300">{location.phone}</p>
                    </div>
                  ))}
                </div>

                <div className="mt-8 space-y-4">
                  <div className="flex items-center space-x-4">
                    <div className="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                      <span className="text-blue-300">@</span>
                    </div>
                    <p className="text-blue-300">mercadeo@starpark.com.co</p>
                  </div>
                  <div className="flex items-center space-x-4">
                    <div className="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                      <span className="text-blue-300">M</span>
                    </div>
                    <p className="text-blue-300">3118090610</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {/* Contact Form */}
          <div className="bg-indigo-900/50 backdrop-blur-sm rounded-2xl border border-blue-400/30 p-8">
            <form onSubmit={handleSubmit} className="space-y-6">
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label className="block text-blue-300 mb-2">Nombre</label>
                  <input
                    type="text"
                    name="nombre"
                    value={formData.nombre}
                    onChange={handleChange}
                    className="w-full bg-indigo-950/80 border border-blue-400/30 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                  />
                </div>
                <div>
                  <label className="block text-blue-300 mb-2">Apellido</label>
                  <input
                    type="text"
                    name="apellido"
                    value={formData.apellido}
                    onChange={handleChange}
                    className="w-full bg-indigo-950/80 border border-blue-400/30 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                  />
                </div>
              </div>

              <div>
                <label className="block text-blue-300 mb-2">Email</label>
                <input
                  type="email"
                  name="email"
                  value={formData.email}
                  onChange={handleChange}
                  className="w-full bg-indigo-950/80 border border-blue-400/30 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                  required
                />
              </div>

              <div>
                <label className="block text-blue-300 mb-2">Dirección</label>
                <input
                  type="text"
                  name="direccion"
                  value={formData.direccion}
                  onChange={handleChange}
                  className="w-full bg-indigo-950/80 border border-blue-400/30 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                  required
                />
              </div>

              <div>
                <label className="block text-blue-300 mb-2">Teléfono</label>
                <input
                  type="tel"
                  name="telefono"
                  value={formData.telefono}
                  onChange={handleChange}
                  className="w-full bg-indigo-950/80 border border-blue-400/30 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                  required
                />
              </div>

              <div>
                <label className="block text-blue-300 mb-2">Comentarios</label>
                <textarea
                  name="comentarios"
                  value={formData.comentarios}
                  onChange={handleChange}
                  rows="4"
                  className="w-full bg-indigo-950/80 border border-blue-400/30 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                  required
                />
              </div>

              <div className="flex items-center space-x-2">
                <input
                  type="checkbox"
                  name="aceptaTerminos"
                  checked={formData.aceptaTerminos}
                  onChange={handleChange}
                  className="rounded border-blue-400/30 bg-indigo-950/80"
                  required
                />
                <label className="text-blue-300">
                  Acepto los términos y condiciones
                </label>
              </div>

              <button
                type="submit"
                className="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold py-3 px-6 rounded-lg 
                         hover:from-blue-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105"
              >
                Enviar
              </button>
            </form>

            {submitted && (
              <Alert className="mt-4 bg-green-500/20 border border-green-500 text-green-300">
                ¡Gracias por contactarnos! Te responderemos pronto.
              </Alert>
            )}
          </div>
        </div>
      </div>

      {/* WhatsApp Button */}
      <div className="fixed bottom-4 right-4 z-20">
        <button className="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform">
          <span className="text-white text-2xl">W</span>
        </button>
      </div>
    </div>
  );
};

export default ContactPage;