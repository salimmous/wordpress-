"use client";

import { useState, useEffect } from "react";
import { PromoModal } from "./promo-modal";

export function HeroSlider() {
  const [showPromoModal, setShowPromoModal] = useState(false);
  const [currentSlide, setCurrentSlide] = useState(0);

  const slides = [
    {
      title: "TRANSFORMEZ VOTRE CORPS, TRANSFORMEZ VOTRE VIE",
      subtitle: "Rejoignez le plus grand réseau de fitness au Maroc",
      cta: "COMMENCER MAINTENANT",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1920&q=80",
      offer: "OFFRE SPÉCIALE: 50% DE RÉDUCTION SUR L'ABONNEMENT ANNUEL",
    },
    {
      title: "PLUS DE 50 CLUBS À TRAVERS LE MAROC",
      subtitle:
        "Entraînez-vous où que vous soyez avec une seule carte d'adhésion",
      cta: "TROUVER UN CLUB",
      image:
        "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1920&q=80",
      offer: "NOUVEAU: OUVERTURE DE 5 CLUBS EN 2023",
    },
    {
      title: "DES COACHS CERTIFIÉS À VOTRE SERVICE",
      subtitle:
        "Bénéficiez d'un accompagnement personnalisé pour atteindre vos objectifs",
      cta: "RÉSERVER UN COACH",
      image:
        "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1920&q=80",
      offer: "OFFRE DÉCOUVERTE: PREMIÈRE SÉANCE GRATUITE",
    },
  ];

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentSlide((prev) => (prev === slides.length - 1 ? 0 : prev + 1));
    }, 5000);

    return () => clearInterval(interval);
  }, [slides.length]);

  const goToSlide = (index: number) => {
    setCurrentSlide(index);
  };

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev === slides.length - 1 ? 0 : prev + 1));
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev === 0 ? slides.length - 1 : prev - 1));
  };

  return (
    <>
      <section className="relative h-screen overflow-hidden">
        {slides.map((slide, index) => (
          <div
            key={index}
            className={`absolute inset-0 transition-opacity duration-1000 ${index === currentSlide ? "opacity-100 z-10" : "opacity-0 z-0"}`}
          >
            <div className="absolute inset-0 bg-gradient-to-r from-black/80 to-black/40 z-10"></div>
            <img
              src={slide.image}
              alt={slide.title}
              className="absolute inset-0 w-full h-full object-cover transition-transform duration-10000 ease-out scale-105"
              style={{
                transform: index === currentSlide ? "scale(1)" : "scale(1.05)",
              }}
            />

            <div className="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center">
              <div className="max-w-3xl">
                <div className="inline-block bg-[#f26f21] text-white px-4 py-1 rounded-full text-sm font-bold mb-6 animate-pulse">
                  {slide.offer}
                </div>
                <h2 className="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
                  {slide.title.split(" ").map((word, i) =>
                    i % 3 === 0 ? (
                      <span key={i} className="text-[#f26f21]">
                        {word}{" "}
                      </span>
                    ) : (
                      <span key={i}>{word} </span>
                    ),
                  )}
                </h2>
                <p className="text-xl text-white/80 mb-10 max-w-2xl">
                  {slide.subtitle}
                </p>
                <div className="flex flex-col sm:flex-row gap-4">
                  <button
                    onClick={() => setShowPromoModal(true)}
                    className="bg-[#f26f21] text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-[#e05a10] transition-all shadow-xl shadow-[#f26f21]/20 group"
                  >
                    {slide.cta}
                    <span className="ml-2 inline-block transition-transform group-hover:translate-x-1">
                      →
                    </span>
                  </button>
                  <button className="bg-white/10 backdrop-blur-sm text-white border border-white/30 px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition-all">
                    EN SAVOIR PLUS
                  </button>
                </div>
              </div>
            </div>
          </div>
        ))}

        {/* Navigation arrows */}
        <button
          onClick={prevSlide}
          className="absolute left-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors"
          aria-label="Previous slide"
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
              d="M15 19l-7-7 7-7"
            />
          </svg>
        </button>

        <button
          onClick={nextSlide}
          className="absolute right-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors"
          aria-label="Next slide"
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
              d="M9 5l7 7-7 7"
            />
          </svg>
        </button>

        {/* Dots navigation */}
        <div className="absolute bottom-10 left-0 right-0 z-30 flex justify-center space-x-3">
          {slides.map((_, index) => (
            <button
              key={index}
              onClick={() => goToSlide(index)}
              className={`w-3 h-3 rounded-full transition-colors ${index === currentSlide ? "bg-[#f26f21]" : "bg-white/50 hover:bg-white/80"}`}
              aria-label={`Go to slide ${index + 1}`}
            />
          ))}
        </div>
      </section>

      {showPromoModal && (
        <PromoModal onClose={() => setShowPromoModal(false)} />
      )}
    </>
  );
}
