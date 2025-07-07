import React from 'react';
import { useEffect, useState } from 'react';

const Homepage = () => {
  const [isLoaded, setIsLoaded] = useState(false);

  useEffect(() => {
    setIsLoaded(true);
  }, []);

  return (
    <div className="min-h-screen bg-indigo-950 relative overflow-hidden">
      {/* Background stars */}
      <div className="absolute inset-0 opacity-50">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjRkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxjaXJjbGUgY3g9IjIiIGN5PSIyIiByPSIyIi8+PC9nPjwvc3ZnPg==')] bg-repeat opacity-30" />
      </div>

      {/* Header */}
      <header className="relative z-10 p-4">
        <div className="container mx-auto flex justify-between items-center">
          <div className="text-4xl font-bold text-blue-400">
            <img src="/api/placeholder/150/50" alt="Star Park Logo" className="h-12" />
          </div>
          <div className="flex gap-4">
            {['Facebook', 'Instagram', 'TikTok'].map((social) => (
              <div key={social} className="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                <span className="text-white text-xs">{social[0]}</span>
              </div>
            ))}
          </div>
        </div>
      </header>

      {/* Main cockpit view */}
      <main className="relative z-10 container mx-auto mt-8">
        <div className={`transform transition-all duration-1000 ${isLoaded ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'}`}>
          {/* Cockpit frame */}
          <div className="relative bg-indigo-900/50 rounded-lg p-8 backdrop-blur-sm border border-blue-400/30">
            {/* Side panels */}
            <div className="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-blue-500/20 to-transparent" />
            <div className="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-blue-500/20 to-transparent" />
            
            {/* Main display */}
            <div className="relative aspect-video bg-black/30 rounded-lg overflow-hidden">
              <img src="/api/placeholder/1200/675" alt="Park View" className="w-full h-full object-cover opacity-80" />
              
              {/* Navigation overlay */}
              <div className="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent">
                <div className="flex justify-center gap-8">
                  {['PARQUES', 'SERVICIOS', 'CONTACTO'].map((item) => (
                    <button
                      key={item}
                      className="px-8 py-3 bg-blue-400/20 hover:bg-blue-400/40 rounded-lg backdrop-blur-sm
                               border border-blue-400/50 text-blue-100 font-semibold
                               transition-all duration-300 hover:scale-105"
                    >
                      {item}
                    </button>
                  ))}
                </div>
              </div>
            </div>

            {/* Control panels */}
            <div className="mt-6 grid grid-cols-3 gap-4">
              {[...Array(3)].map((_, i) => (
                <div
                  key={i}
                  className="h-16 bg-blue-900/30 rounded border border-blue-400/30
                           flex items-center justify-center"
                >
                  <div className="w-8 h-8 rounded-full bg-blue-400/20 animate-pulse" />
                </div>
              ))}
            </div>
          </div>
        </div>
      </main>

      {/* Decorative elements */}
      <div className="fixed bottom-4 right-4 z-20">
        <button className="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform">
          <span className="text-white text-2xl">W</span>
        </button>
      </div>
    </div>
  );
};

export default Homepage;