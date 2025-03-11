"use client";

import { useState } from "react";

interface FaqItem {
  question: string;
  answer: string;
}

export function FaqSection() {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const faqs: FaqItem[] = [
    {
      question: "Avez-Vous Un Espace 100% Femmes ?",
      answer:
        "Oui, City Club propose un espace entièrement dédié aux femmes, offrant un environnement confortable et privé pour s'entraîner.",
    },
    {
      question: "Quels Sont Vos Horaires D'ouverture ?",
      answer:
        "Nos clubs sont ouverts 7j/7 avec des horaires étendus : Lundi-Vendredi de 6h à 23h, Samedi de 8h à 22h, Dimanche de 8h à 20h et jours fériés de 10h à 18h.",
    },
    {
      question: "Offrez-Vous Des Programmes D'entraînement Personnalisés ?",
      answer:
        "Oui, nos coachs certifiés élaborent des programmes personnalisés adaptés à vos objectifs spécifiques, que ce soit pour perdre du poids, gagner en masse musculaire ou améliorer votre condition physique.",
    },
    {
      question: "Quels Types D'équipements Proposez-Vous ?",
      answer:
        "Nos clubs sont équipés de machines cardio et de musculation haut de gamme, d'espaces de poids libres, de zones fonctionnelles, et de studios pour les cours collectifs.",
    },
    {
      question: "Avez-Vous Des Piscines Et Des Terrains ?",
      answer:
        "Certains de nos clubs premium disposent de piscines, de terrains de squash, et d'espaces dédiés aux sports collectifs comme le basketball et le football en salle.",
    },
  ];

  return (
    <section className="py-16 bg-white" id="faq">
      <div className="container mx-auto px-6">
        <div className="flex flex-col md:flex-row gap-12">
          <div className="md:w-1/3">
            <h2 className="text-4xl font-extrabold text-gray-900 mb-4">
              FOIRE AUX <span className="text-[#f26f21]">QUESTIONS !</span>
            </h2>
            <p className="text-gray-600 mb-6">
              Trouvez rapidement des réponses à vos questions les plus
              fréquentes sur nos services et installations.
            </p>
          </div>

          <div className="md:w-2/3">
            <div className="space-y-4">
              {faqs.map((faq, index) => (
                <div
                  key={index}
                  className="border border-gray-200 rounded-lg overflow-hidden"
                >
                  <button
                    className="w-full flex justify-between items-center p-4 text-left font-medium text-gray-900 hover:bg-gray-50 transition-colors"
                    onClick={() =>
                      setOpenIndex(openIndex === index ? null : index)
                    }
                  >
                    <span>{faq.question}</span>
                    <span className="text-[#f26f21]">
                      {openIndex === index ? (
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          className="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fillRule="evenodd"
                            d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                            clipRule="evenodd"
                          />
                        </svg>
                      ) : (
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          className="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fillRule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clipRule="evenodd"
                          />
                        </svg>
                      )}
                    </span>
                  </button>
                  {openIndex === index && (
                    <div className="p-4 bg-gray-50 border-t border-gray-200">
                      <p className="text-gray-600">{faq.answer}</p>
                    </div>
                  )}
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
