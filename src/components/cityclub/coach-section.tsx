import { SectionTitle } from "./section-title";

export function CoachSection() {
  const coaches = [
    {
      name: "Karim Benali",
      role: "Coach de musculation",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=karim&backgroundColor=f26f21",
      expertise: ["Musculation", "Nutrition", "Perte de poids"],
      experience: "8 ans",
    },
    {
      name: "Leila Tazi",
      role: "Coach de yoga",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=leila&backgroundColor=1a73e8",
      expertise: ["Yoga", "Méditation", "Stretching"],
      experience: "6 ans",
    },
    {
      name: "Youssef Alami",
      role: "Coach de cardio",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=youssef&backgroundColor=34a853",
      expertise: ["Cardio", "HIIT", "Endurance"],
      experience: "5 ans",
    },
    {
      name: "Samira Idrissi",
      role: "Coach de pilates",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=samira&backgroundColor=673ab7",
      expertise: ["Pilates", "Posture", "Réhabilitation"],
      experience: "7 ans",
    },
  ];

  const coachFeatures = [
    {
      title: "FORMATIONS CONTINUES",
      description:
        "Nos coachs suivent 8 formations par an pour vous accompagner",
      icon: (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path d="M12 14l9-5-9-5-9 5 9 5z" />
          <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
          />
        </svg>
      ),
    },
    {
      title: "COACHS SPÉCIALISÉS",
      description: "Faites vous coacher par activité selon vos objectifs",
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
      title: "CONSEILS DIÉTÉTIQUES",
      description: "Faites vous conseiller par des experts de la nutrition",
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
            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"
          />
        </svg>
      ),
    },
    {
      title: "COACHS POUR LES 100% FEMMES",
      description: "Des coachs femmes pour des centres City Lady 100% femmes",
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
            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      ),
    },
  ];

  return (
    <section className="py-24 bg-white" id="coaching">
      <div className="container mx-auto px-6">
        <SectionTitle
          subtitle="NOS EXPERTS"
          title="Plus de 600 Coachs Certifiés"
          description="Nos coachs certifiés possèdent une expertise approfondie dans divers domaines du fitness et de la santé"
        />

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-16">
          <div>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
              {coachFeatures.map((feature, index) => (
                <div
                  key={index}
                  className="bg-gray-50 p-6 rounded-xl hover:shadow-md transition-shadow"
                >
                  <div className="bg-[#f26f21]/10 w-12 h-12 rounded-lg flex items-center justify-center text-[#f26f21] mb-4">
                    {feature.icon}
                  </div>
                  <h3 className="font-bold text-gray-900 mb-2">
                    {feature.title}
                  </h3>
                  <p className="text-gray-600 text-sm">{feature.description}</p>
                </div>
              ))}
            </div>

            <div className="mt-8 p-6 bg-[#f26f21]/5 rounded-xl border border-[#f26f21]/20">
              <div className="flex items-start">
                <div className="bg-[#f26f21] rounded-full p-2 text-white mr-4 mt-1">
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
                      d="M13 10V3L4 14h7v7l9-11h-7z"
                    />
                  </svg>
                </div>
                <div>
                  <h3 className="text-xl font-bold text-gray-900 mb-2">
                    Coaching Personnalisé
                  </h3>
                  <p className="text-gray-600 mb-4">
                    Nos coachs élaborent des programmes personnalisés adaptés à
                    vos objectifs spécifiques, que ce soit pour perdre du poids,
                    gagner en masse musculaire ou améliorer votre condition
                    physique.
                  </p>
                  <a
                    href="#"
                    className="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center"
                  >
                    Réserver une séance
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      className="h-5 w-5 ml-1"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M14 5l7 7m0 0l-7 7m7-7H3"
                      />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div className="relative">
            <div className="absolute -top-10 -left-10 w-40 h-40 bg-[#f26f21]/10 rounded-full filter blur-3xl"></div>
            <div className="absolute -bottom-10 -right-10 w-40 h-40 bg-[#f26f21]/10 rounded-full filter blur-3xl"></div>

            <div className="relative z-10 grid grid-cols-2 gap-6">
              {coaches.map((coach, index) => (
                <div
                  key={index}
                  className="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100"
                >
                  <div className="relative h-48 overflow-hidden bg-gradient-to-br from-[#f26f21]/80 to-[#e05a10]/80">
                    <div className="absolute inset-0 flex items-center justify-center">
                      <img
                        src={coach.image}
                        alt={coach.name}
                        className="h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300"
                      />
                    </div>
                  </div>

                  <div className="p-4 text-center">
                    <h3 className="text-lg font-bold text-gray-900">
                      {coach.name}
                    </h3>
                    <p className="text-[#f26f21] font-medium text-sm mb-2">
                      {coach.role}
                    </p>
                    <div className="flex justify-center gap-2 mb-3">
                      {coach.expertise.map((skill, idx) => (
                        <span
                          key={idx}
                          className="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full"
                        >
                          {skill}
                        </span>
                      ))}
                    </div>
                    <div className="text-xs text-gray-500">
                      Expérience: {coach.experience}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>

        <div className="text-center">
          <a
            href="#"
            className="inline-block bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors shadow-lg shadow-[#f26f21]/20"
          >
            DÉCOUVRIR TOUS NOS COACHS
          </a>
        </div>
      </div>
    </section>
  );
}
