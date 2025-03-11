import { SectionTitle } from "./section-title";

export function MedicalAssessment() {
  const steps = [
    {
      number: "01",
      title: "DEMANDEZ VOTRE BILAN",
      description:
        "Approchez votre coach dans l'espace dédié au Bilan Médico-Sportif et demandez de remplir votre planning de réservation digitalisé.",
      icon: (
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
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
          />
        </svg>
      ),
    },
    {
      number: "02",
      title: "PASSEZ VOS TESTS",
      description:
        "En vous faisant assister et évaluer par le coach, passez l'ensemble des tests physiques chronométrés du programme.",
      icon: (
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
            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
          />
        </svg>
      ),
    },
    {
      number: "03",
      title: "RECEVEZ VOTRE PROGRAMME",
      description:
        "Sur la base des résultats de votre test médico-sportif, recevez vos programmes personnalisés sur place et par email.",
      icon: (
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
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
          />
        </svg>
      ),
    },
  ];

  return (
    <section className="py-24 bg-[#0d5e63] text-white" id="bilan">
      <div className="container mx-auto px-6">
        <SectionTitle
          subtitle="BILAN MÉDICO-SPORTIF"
          title="Reprenez en Main Votre Santé"
          description="Notre bilan médico-sportif vous permet d'obtenir un programme d'entraînement personnalisé adapté à votre condition physique et à vos objectifs"
          textColor="light"
        />

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div className="relative">
            <div className="absolute -top-10 -left-10 w-40 h-40 bg-white/5 rounded-full filter blur-3xl"></div>
            <div className="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full filter blur-3xl"></div>

            <div className="relative z-10">
              <div className="rounded-2xl overflow-hidden shadow-2xl">
                <img
                  src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&q=80"
                  alt="Bilan Médico-Sportif"
                  className="w-full h-auto"
                />
              </div>

              <div className="absolute -bottom-8 -right-8 bg-[#f26f21] text-white p-6 rounded-2xl shadow-xl">
                <div className="text-3xl font-black">600+</div>
                <div className="text-sm font-medium">COACHS CERTIFIÉS</div>
              </div>
            </div>
          </div>

          <div>
            <div className="space-y-8">
              {steps.map((step, index) => (
                <div key={index} className="flex">
                  <div className="mr-6 flex-shrink-0">
                    <div className="w-12 h-12 rounded-full bg-[#f26f21] flex items-center justify-center text-white font-bold">
                      {step.number}
                    </div>
                    {index < steps.length - 1 && (
                      <div className="w-0.5 h-16 bg-[#f26f21]/30 mx-auto my-2"></div>
                    )}
                  </div>

                  <div>
                    <div className="bg-white/10 backdrop-blur-sm p-6 rounded-xl">
                      <div className="flex items-center mb-3">
                        <div className="bg-[#f26f21]/20 p-2 rounded-lg text-white mr-3">
                          {step.icon}
                        </div>
                        <h3 className="text-xl font-bold">{step.title}</h3>
                      </div>
                      <p className="text-white/80">{step.description}</p>
                    </div>
                  </div>
                </div>
              ))}
            </div>

            <div className="mt-12 flex gap-6">
              <button className="bg-[#f26f21] hover:bg-[#e05a10] text-white px-8 py-4 rounded-lg font-semibold transition-colors shadow-lg shadow-[#f26f21]/20 flex-1">
                RÉSERVER MON BILAN
              </button>
              <button className="bg-white/10 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/20 transition-colors flex-1">
                EN SAVOIR PLUS
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
