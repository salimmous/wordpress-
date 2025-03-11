"use client";

import { useState } from "react";

interface PromoModalProps {
  onClose: () => void;
}

export function PromoModal({ onClose }: PromoModalProps) {
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
    <div className="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50">
      <div className="bg-white rounded-2xl p-8 max-w-md w-full relative">
        <button
          onClick={onClose}
          className="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition-colors"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            className="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth={2}
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>

        <div className="bg-[#f26f21] text-white px-4 py-2 rounded-lg text-sm font-bold mb-6 inline-block">
          OFFRE LIMITÉE
        </div>

        <h3 className="text-2xl font-bold mb-2">
          Profitez de notre offre spéciale
        </h3>
        <p className="text-gray-600 mb-6">
          Inscrivez-vous maintenant et bénéficiez de 50% de réduction sur votre
          abonnement annuel!
        </p>

        <form className="space-y-4">
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">
              Nom complet
            </label>
            <input
              type="text"
              className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none"
              placeholder="Votre nom et prénom"
            />
          </div>

          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">
              Email
            </label>
            <input
              type="email"
              className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none"
              placeholder="votre.email@exemple.com"
            />
          </div>

          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">
              Téléphone
            </label>
            <input
              type="tel"
              className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none"
              placeholder="+212 6XX XXX XXX"
            />
          </div>

          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">
              Club le plus proche
            </label>
            <select
              value={selectedCity}
              onChange={(e) => setSelectedCity(e.target.value)}
              className="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#f26f21] focus:border-[#f26f21] outline-none"
            >
              <option value="">Sélectionnez une ville</option>
              {cities.map((city, index) => (
                <option key={index} value={city.toLowerCase()}>
                  {city}
                </option>
              ))}
            </select>
          </div>

          <div className="flex items-start mt-4">
            <input type="checkbox" id="terms" className="mt-1 mr-2" />
            <label htmlFor="terms" className="text-sm text-gray-600">
              J'accepte les{" "}
              <a href="#" className="text-[#f26f21] hover:underline">
                conditions d'utilisation
              </a>{" "}
              et la{" "}
              <a href="#" className="text-[#f26f21] hover:underline">
                politique de confidentialité
              </a>
            </label>
          </div>

          <button
            type="submit"
            className="w-full bg-[#f26f21] text-white py-3 rounded-md font-semibold hover:bg-[#e05a10] transition-all mt-2"
          >
            RÉSERVER MON OFFRE
          </button>
        </form>

        <p className="text-xs text-gray-500 mt-4 text-center">
          * Offre valable pour les nouveaux membres uniquement. Voir conditions
          en club.
        </p>
      </div>
    </div>
  );
}
