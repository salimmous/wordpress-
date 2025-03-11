"use client";

import { useState } from "react";
import { PromoModal } from "./promo-modal";

export function CityClubHero() {
  const [showPromoModal, setShowPromoModal] = useState(false);

  return (
    <>
      <section className="relative h-screen overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-10"></div>
        <video
          className="absolute inset-0 w-full h-full object-cover"
          autoPlay
          muted
          loop
          playsInline
        >
          <source
            src="https://assets.mixkit.co/videos/preview/mixkit-people-exercising-in-a-gym-23401-large.mp4"
            type="video/mp4"
          />
        </video>

        <div className="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center">
          <div className="max-w-3xl">
            <div className="inline-block bg-[#f26f21] text-white px-4 py-1 rounded-full text-sm font-bold mb-6 animate-pulse">
              OFFRE SPÉCIALE: 50% DE RÉDUCTION SUR L'ABONNEMENT ANNUEL
            </div>
            <h2 className="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
              TRANSFORMEZ <span className="text-[#f26f21]">VOTRE CORPS</span>,
              TRANSFORMEZ <span className="text-[#f26f21]">VOTRE VIE</span>
            </h2>
            <p className="text-xl text-white/80 mb-10 max-w-2xl">
              Rejoignez le plus grand réseau de fitness au Maroc avec plus de 50
              clubs et une communauté de 230,000+ membres.
            </p>
            <div className="flex flex-col sm:flex-row gap-4">
              <button
                onClick={() => setShowPromoModal(true)}
                className="bg-[#f26f21] text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-[#e05a10] transition-all shadow-xl shadow-[#f26f21]/20 group"
              >
                COMMENCER MAINTENANT
                <span className="ml-2 inline-block transition-transform group-hover:translate-x-1">
                  →
                </span>
              </button>
              <button className="bg-white/10 backdrop-blur-sm text-white border border-white/30 px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition-all">
                TROUVER UN CLUB
              </button>
            </div>
          </div>
        </div>

        <div className="absolute bottom-10 left-0 right-0 z-20 flex justify-center">
          <div className="animate-bounce bg-white/10 backdrop-blur-md p-2 rounded-full">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="h-6 w-6 text-white"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M19 14l-7 7m0 0l-7-7m7 7V3"
              />
            </svg>
          </div>
        </div>
      </section>

      {showPromoModal && (
        <PromoModal onClose={() => setShowPromoModal(false)} />
      )}
    </>
  );
}
