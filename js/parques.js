import React, { useState } from 'react';

const LocationsPage = () => {
  const [hoveredLocation, setHoveredLocation] = useState(null);

  const locations = [
    {
      id: 'bogota',
      name: 'BOGOTÁ',
      color: 'from-blue-400 to-blue-600',
      size: 'lg',
      position: 'center'
    },
    {
      id: 'hayuelos',
      name: 'HAYUELOS',
      color: 'from-orange-400 to-orange-600',
      size: 'md',
      position: 'left'
    },
    {
      id: 'altavista',
      name: 'ALTAVISTA',
      color: 'from-purple-400 to-purple-600',
      size: 'md',
      position: 'left-center'
    },
    {
      id: 'bulevar',
      name: 'BULEVAR NIZA',
      color: 'from-yellow-400 to-yellow-600',
      size: 'md',
      position: 'right-center'
    },
    {
      id: 'paseo',
      name: 'PASEO VILLA DEL RÍO',
      color: 'from-pink-400 to-pink-600',
      size: 'md',
      position: 'right'
    },
    {
      id: 'mosquera',
      name: 'MOSQUERA',
      color: 'from-cyan-400 to-cyan-600',
      size: 'sm',
      position: 'bottom-left'
    },
    {
      id: 'neiva',
      name: 'NEIVA',
      color: 'from-red-400 to-red-600',
      size: 'sm',
      position: 'bottom-left-center'
    },
    {
      id: 'bello',
      name: 'BELLO',
      color: 'from-green-400 to-green-600',
      size: 'sm',
      position: 'bottom-center'
    },
    {
      id: 'mayorca',
      name: 'MAYORCA',
      color: 'from-blue-300 to-blue-500',
      size: 'sm',
      position: 'bottom-right-center'
    },
    {
      id: 'cali',
      name: 'CALI',
      color: 'from-violet-400 to-violet-600',
      size: 'sm',
      position: 'bottom-right'
    }
  ];

  const getSizeClasses = (size) => {
    switch (size) {
      case 'lg': return 'w-32 h-32';
      case 'md': return 'w-24 h-24';
      case 'sm': return 'w-20 h-20';
      default: return 'w-20 h-20';
    }
  };

  const getPositionClasses = (position) => {
    const positions = {
      'center': 'top-1/4 left-1/2 -translate-x-1/2',
      'left': 'top-1/3 left-1/4',
      'left-center': 'top-1/3 left-1/3',
      'right-center': 'top-1/3 right-1/3',
      'right': 'top-1/3 right-1/4',
      'bottom-left': 'bottom-1/4 left-1/6',
      'bottom-left-center': 'bottom-1/4 left-1/3',
      'bottom-center': 'bottom-1/4 left-1/2 -translate-x-1/2',
      'bottom-right-center': 'bottom-1/4 right-1/3',
      'bottom-right': 'bottom-1/4 right-1/6'
    };
    return positions[position] || '';
  };

  return (
    <div className="min-h-screen bg-indigo-950 relative overflow-hidden pt-16 pb-32">
      {/* Background stars */}
      <div className="absolute inset-0">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjRkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+PC9nPjwvc3ZnPg==')] bg-repeat opacity-30" />
      </div>

      {/* Header text */}
      <div className="relative text-center mb-16">
        <h1 className="text-4xl font-bold text-white mb-4">Nuestros Parques</h1>
        <div className="w-32 h-1 bg-blue-400 mx-auto"/>
      </div>

      {/* Locations container */}
      <div className="relative container mx-auto h-screen max-h-[800px]">
        {locations.map((location) => (
          <div
            key={location.id}
            className={`absolute ${getPositionClasses(location.position)}`}
          >
            <button
              className={`
                relative group
                ${getSizeClasses(location.size)}
                rounded-full
                bg-gradient-to-br ${location.color}
                transform transition-all duration-500
                hover:scale-110 hover:shadow-lg hover:shadow-${location.color.split('-')[1]}-400/50
                ${hoveredLocation && hoveredLocation !== location.id ? 'opacity-50' : 'opacity-100'}
              `}
              onMouseEnter={() => setHoveredLocation(location.id)}
              onMouseLeave={() => setHoveredLocation(null)}
            >
              {/* Planet ring */}
              <div className="absolute -inset-4 border-2 border-transparent rounded-full group-hover:border-white/20 transition-all duration-300" />
              
              {/* Planet glow */}
              <div className="absolute inset-0 rounded-full bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300" />
              
              {/* Planet name */}
              <div className="absolute -bottom-8 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
                <span className="text-white text-sm font-bold">{location.name}</span>
              </div>
            </button>
          </div>
        ))}

        {/* Central section title */}
        <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 translate-y-16">
          <div className="text-blue-400 text-xl font-bold px-6 py-2 rounded-lg bg-blue-900/30 border border-blue-400/30">
            RESTO DEL PAÍS
          </div>
        </div>
      </div>
    </div>
  );
};

export default LocationsPage;