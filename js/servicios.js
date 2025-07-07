import React, { useState } from 'react';

const ServicesPage = () => {
  const [selectedService, setSelectedService] = useState(null);

  const services = [
    {
      id: 'cumpleanos',
      title: 'CELEBRA TU CUMPLEAÑOS',
      subtitle: '¿ESTÁS DE CUMPLEAÑOS?',
      description: 'VEN Y VIVELO CON NOSOTROS',
      image: '/api/placeholder/400/300',
      color: 'from-green-400 to-green-600'
    },
    {
      id: 'colegios',
      title: 'FIESTAS COLEGIOS',
      subtitle: 'LE DAMOS COLOR A TUS',
      description: 'EVENTOS COLEGIALES',
      image: '/api/placeholder/400/300',
      color: 'from-blue-400 to-blue-600'
    },
    {
      id: 'diversion',
      title: 'SUPER DIVERSIÓN',
      subtitle: 'DIVIÉRTETE CON NUESTROS',
      description: 'PAQUETES DE SUPER DIVERSIÓN',
      image: '/api/placeholder/400/300',
      color: 'from-yellow-400 to-yellow-600'
    },
    {
      id: 'empresariales',
      title: 'EVENTOS EMPRESARIALES',
      subtitle: 'ESPACIOS DISEÑADOS PARA',
      description: 'TUS EVENTOS CORPORATIVOS',
      image: '/api/placeholder/400/300',
      color: 'from-purple-400 to-purple-600'
    },
    {
      id: 'infantiles',
      title: 'FIESTAS INFANTILES',
      subtitle: 'CREAMOS MOMENTOS',
      description: 'INOLVIDABLES',
      image: '/api/placeholder/400/300',
      color: 'from-pink-400 to-pink-600'
    }
  ];

  return (
    <div className="min-h-screen bg-indigo-950 relative overflow-hidden py-16">
      {/* Background stars */}
      <div className="absolute inset-0">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjRkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+PC9nPjwvc3ZnPg==')] bg-repeat opacity-30" />
      </div>

      {/* Header */}
      <div className="relative text-center mb-16">
        <div className="inline-block">
          <h1 className="text-4xl font-bold text-white mb-4">NUESTROS SERVICIOS</h1>
          <div className="w-32 h-1 bg-blue-400 mx-auto"/>
        </div>
      </div>

      {/* Services Grid */}
      <div className="relative container mx-auto px-4">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {services.map((service) => (
            <div
              key={service.id}
              className="group relative"
              onMouseEnter={() => setSelectedService(service.id)}
              onMouseLeave={() => setSelectedService(null)}
            >
              {/* Card */}
              <div className="relative overflow-hidden rounded-xl bg-gradient-to-br from-indigo-900/50 to-indigo-950/50 backdrop-blur-sm border border-white/10">
                {/* Image */}
                <div className="relative aspect-[4/3] overflow-hidden">
                  <img
                    src={service.image}
                    alt={service.title}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                  />
                  {/* Overlay */}
                  <div className="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent" />
                </div>

                {/* Content */}
                <div className="absolute bottom-0 left-0 right-0 p-6 transform transition-transform duration-500">
                  <div className="space-y-2">
                    <h3 className={`text-lg font-bold bg-gradient-to-r ${service.color} bg-clip-text text-transparent`}>
                      {service.subtitle}
                    </h3>
                    <h2 className="text-2xl font-bold text-white">
                      {service.title}
                    </h2>
                    <p className="text-gray-300">
                      {service.description}
                    </p>
                  </div>

                  {/* Button */}
                  <button className={`
                    mt-4 px-6 py-2 rounded-lg
                    bg-gradient-to-r ${service.color}
                    text-white font-semibold
                    transform transition-all duration-300
                    hover:scale-105 hover:shadow-lg
                    opacity-0 group-hover:opacity-100
                  `}>
                    Más Información
                  </button>
                </div>

                {/* Decorative elements */}
                <div className="absolute top-4 right-4">
                  <div className={`w-3 h-3 rounded-full bg-gradient-to-r ${service.color}`} />
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Floating action button */}
      <div className="fixed bottom-4 right-4 z-20">
        <button className="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform">
          <span className="text-white text-2xl">W</span>
        </button>
      </div>
    </div>
  );
};

export default ServicesPage;