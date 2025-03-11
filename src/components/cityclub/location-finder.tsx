"use client";

import { useState } from "react";

export function CityClubLocationFinder() {
  const [selectedCity, setSelectedCity] = useState("");

  const cities = [
    "Casablanca",
    "Rabat",
    "Marrakech",
    "Tanger",
    "Agadir",
    "Fès",
    "Meknès",
    "Oujda",
  ];

  return (
    <section className="py-20 bg-gray-100" id="clubs">
      <div className="container mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <span className="text-[#f26f21] font-semibold text-lg">
              TROUVEZ VOTRE CLUB
            </span>
            <h2 className="text-4xl font-bold text-gray-900 mt-2 mb-6">
              Plus de 50 clubs à travers le Maroc
            </h2>
            <p className="text-gray-600 mb-8">
              Avec des emplacements stratégiques dans toutes les grandes villes
              du Maroc, il y a toujours un CityClub près de chez vous. Tous nos
              clubs sont équipés des dernières machines et technologies pour
              vous offrir une expérience fitness optimale.
            </p>

            <div className="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
              <h3 className="text-xl font-bold mb-4">
                Trouver un club près de chez vous
              </h3>

              <div className="mb-4">
                <label className="block text-sm font-medium text-gray-700 mb-1">
                  Sélectionnez votre ville
                </label>
                <select
                  value={selectedCity}
                  onChange={(e) => setSelectedCity(e.target.value)}
                  className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none"
                >
                  <option value="">Choisir une ville</option>
                  {cities.map((city, index) => (
                    <option key={index} value={city.toLowerCase()}>
                      {city}
                    </option>
                  ))}
                </select>
              </div>

              <button className="w-full bg-[#f26f21] text-white py-3 rounded-md font-semibold hover:bg-[#e05a10] transition-all">
                RECHERCHER
              </button>
            </div>
          </div>

          <div className="relative rounded-xl overflow-hidden h-[500px] shadow-xl">
            {/* This would be replaced with an actual map component */}
            <div className="absolute inset-0 bg-gray-300 flex items-center justify-center">
              <div className="text-center p-8">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-16 w-16 text-gray-500 mx-auto mb-4"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                  />
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                </svg>
                <p className="text-gray-600 text-lg font-medium">
                  Carte interactive des clubs CityClub
                </p>
                <p className="text-gray-500 mt-2">
                  Sélectionnez une ville pour voir les clubs disponibles
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
