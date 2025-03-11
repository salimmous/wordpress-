import { SectionTitle } from "./section-title";

export function MembershipPlans() {
  const plans = [
    {
      name: "BASIC",
      price: "199",
      period: "DH/mois",
      features: [
        { text: "Accès à votre club d'inscription", included: true },
        { text: "Accès aux machines cardio et musculation", included: true },
        {
          text: "Accès aux cours collectifs (planning standard)",
          included: true,
        },
        { text: "Casier journalier gratuit", included: true },
        { text: "Accès à tous les clubs CityClub", included: false },
        { text: "Séances avec coach personnel", included: false },
        { text: "Accès aux espaces privilèges", included: false },
      ],
      color: "bg-gradient-to-r from-gray-700 to-gray-900",
      popular: false,
      badge: "",
    },
    {
      name: "PREMIUM",
      price: "299",
      period: "DH/mois",
      features: [
        { text: "Accès à votre club d'inscription", included: true },
        { text: "Accès aux machines cardio et musculation", included: true },
        {
          text: "Accès aux cours collectifs (planning standard)",
          included: true,
        },
        { text: "Casier journalier gratuit", included: true },
        { text: "Accès à tous les clubs CityClub", included: true },
        { text: "1 séance avec coach personnel offerte/mois", included: true },
        { text: "Accès aux espaces privilèges", included: true },
      ],
      color: "bg-gradient-to-r from-[#f26f21] to-[#e05a10]",
      popular: true,
      badge: "PLUS POPULAIRE",
    },
    {
      name: "VIP",
      price: "499",
      period: "DH/mois",
      features: [
        { text: "Accès à votre club d'inscription", included: true },
        { text: "Accès aux machines cardio et musculation", included: true },
        {
          text: "Accès aux cours collectifs (planning standard)",
          included: true,
        },
        { text: "Casier journalier gratuit", included: true },
        { text: "Accès à tous les clubs CityClub", included: true },
        {
          text: "4 séances avec coach personnel offertes/mois",
          included: true,
        },
        { text: "Accès illimité aux espaces privilèges", included: true },
      ],
      color: "bg-gradient-to-r from-black to-gray-900",
      popular: false,
      badge: "PREMIUM",
    },
  ];

  return (
    <section className="py-24 bg-gray-900" id="memberships">
      <div className="container mx-auto px-6">
        <SectionTitle
          subtitle="NOS ABONNEMENTS"
          title="Choisissez l'Offre Qui Vous Convient"
          description="Des formules adaptées à tous les budgets et à tous les objectifs, avec des avantages exclusifs pour chaque niveau d'abonnement"
          textColor="light"
        />

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {plans.map((plan, index) => (
            <div
              key={index}
              className={`rounded-2xl overflow-hidden ${plan.popular ? "transform scale-105 shadow-2xl z-10" : "shadow-xl"} transition-all hover:shadow-2xl relative`}
            >
              {plan.badge && (
                <div className="absolute top-0 right-0 bg-white text-[#f26f21] text-xs font-bold uppercase px-4 py-1 rounded-bl-lg z-10">
                  {plan.badge}
                </div>
              )}

              <div
                className={`${plan.color} p-8 text-white relative overflow-hidden`}
              >
                <div className="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
                <div className="absolute -left-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full"></div>

                <h3 className="text-2xl font-bold mb-2 relative z-10">
                  {plan.name}
                </h3>
                <div className="flex items-baseline relative z-10">
                  <span className="text-5xl font-black">{plan.price}</span>
                  <span className="ml-2 text-white/80">{plan.period}</span>
                </div>

                <div className="mt-4 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg inline-block relative z-10">
                  <span className="text-sm">Engagement 12 mois</span>
                </div>
              </div>

              <div className="bg-white p-8">
                <ul className="space-y-4">
                  {plan.features.map((feature, idx) => (
                    <li key={idx} className="flex items-start">
                      {feature.included ? (
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          className="h-5 w-5 text-[#f26f21] mr-3 mt-0.5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fillRule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clipRule="evenodd"
                          />
                        </svg>
                      ) : (
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          className="h-5 w-5 text-gray-300 mr-3 mt-0.5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fillRule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clipRule="evenodd"
                          />
                        </svg>
                      )}
                      <span
                        className={
                          feature.included ? "text-gray-700" : "text-gray-400"
                        }
                      >
                        {feature.text}
                      </span>
                    </li>
                  ))}
                </ul>

                <div className="mt-8">
                  <button
                    className={`w-full py-4 rounded-lg font-semibold ${plan.popular ? "bg-[#f26f21] hover:bg-[#e05a10] text-white" : "bg-gray-100 hover:bg-gray-200 text-gray-800"} transition-colors`}
                  >
                    CHOISIR CE FORFAIT
                  </button>

                  <p className="text-xs text-gray-500 mt-4 text-center">
                    * Frais d'inscription de 300 DH. Voir conditions en club.
                  </p>
                </div>
              </div>
            </div>
          ))}
        </div>

        <div className="mt-16 bg-white/5 backdrop-blur-sm p-8 rounded-2xl border border-white/10 text-center">
          <h3 className="text-2xl font-bold text-white mb-4">
            Vous avez des questions sur nos abonnements?
          </h3>
          <p className="text-white/80 mb-6 max-w-2xl mx-auto">
            Nos conseillers sont disponibles pour vous aider à choisir
            l'abonnement qui correspond le mieux à vos besoins et objectifs.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <a
              href="#"
              className="bg-white text-gray-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-flex items-center justify-center"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-5 w-5 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                />
              </svg>
              NOUS CONTACTER
            </a>
            <a
              href="#"
              className="bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors inline-flex items-center justify-center"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-5 w-5 mr-2"
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
              RÉSERVER UNE VISITE
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
