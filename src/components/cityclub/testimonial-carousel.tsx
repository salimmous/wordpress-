"use client";

import { useState } from "react";

interface Testimonial {
  id: number;
  name: string;
  role: string;
  image: string;
  quote: string;
}

export function TestimonialCarousel() {
  const [activeIndex, setActiveIndex] = useState(0);

  const testimonials: Testimonial[] = [
    {
      id: 1,
      name: "Zakaria",
      role: "Membre depuis 1 an",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=zakaria",
      quote:
        "Les programmes que j'ai reçu correspondent bien à ma structure corporelle, je suis très content de pouvoir suivre mon évolution.",
    },
    {
      id: 2,
      name: "Leila",
      role: "Membre depuis 6 mois",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=leila",
      quote:
        "J'adore l'espace 100% femmes, c'est très confortable et les coachs sont vraiment à l'écoute de nos besoins.",
    },
    {
      id: 3,
      name: "Karim",
      role: "Membre depuis 2 ans",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=karim",
      quote:
        "Grâce au bilan médico-sportif, j'ai pu avoir un programme adapté à mes objectifs et j'ai déjà perdu 15kg en 6 mois!",
    },
  ];

  const nextSlide = () => {
    setActiveIndex((prev) => (prev === testimonials.length - 1 ? 0 : prev + 1));
  };

  const prevSlide = () => {
    setActiveIndex((prev) => (prev === 0 ? testimonials.length - 1 : prev - 1));
  };

  return (
    <section className="py-16 bg-[#f26f21]" id="testimonials">
      <div className="container mx-auto px-6">
        <div className="text-center mb-12">
          <h2 className="text-4xl font-bold text-white mb-4">
            REJOIGNEZ UNE COMMUNAUTÉ DE PLUS DE{" "}
            <span className="font-black">200.000 ADHÉRENTS ACTIFS !</span>
          </h2>
          <p className="text-white/80 max-w-2xl mx-auto">
            Découvrez les témoignages de nos membres qui ont transformé leur vie
            grâce à CityClub
          </p>
        </div>

        <div className="max-w-4xl mx-auto">
          <div className="bg-white rounded-xl overflow-hidden shadow-xl">
            <div className="relative">
              <div className="p-8">
                <div className="flex items-center mb-6">
                  <img
                    src={testimonials[activeIndex].image}
                    alt={testimonials[activeIndex].name}
                    className="w-16 h-16 rounded-full mr-4 border-2 border-[#f26f21]"
                  />
                  <div>
                    <h3 className="text-xl font-bold text-gray-900">
                      {testimonials[activeIndex].name}
                    </h3>
                    <p className="text-[#f26f21]">
                      {testimonials[activeIndex].role}
                    </p>
                  </div>
                </div>

                <blockquote className="text-gray-700 italic text-lg mb-6">
                  "{testimonials[activeIndex].quote}"
                </blockquote>

                <div className="flex justify-between items-center">
                  <div className="flex space-x-2">
                    {testimonials.map((_, index) => (
                      <button
                        key={index}
                        onClick={() => setActiveIndex(index)}
                        className={`w-3 h-3 rounded-full ${index === activeIndex ? "bg-[#f26f21]" : "bg-gray-300"}`}
                        aria-label={`Go to slide ${index + 1}`}
                      />
                    ))}
                  </div>

                  <div className="flex space-x-2">
                    <button
                      onClick={prevSlide}
                      className="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors"
                      aria-label="Previous testimonial"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-5 w-5 text-gray-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fillRule="evenodd"
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clipRule="evenodd"
                        />
                      </svg>
                    </button>
                    <button
                      onClick={nextSlide}
                      className="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors"
                      aria-label="Next testimonial"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-5 w-5 text-gray-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fillRule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clipRule="evenodd"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
