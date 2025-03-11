export function CityClubStats() {
  const stats = [
    {
      number: "50+",
      label: "CLUBS",
      description:
        "À travers tout le Maroc, accessibles avec une seule carte d'adhésion",
      icon: (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-8 w-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
          />
        </svg>
      ),
    },
    {
      number: "600+",
      label: "COACHS CERTIFIÉS",
      description:
        "Experts qualifiés pour vous accompagner dans votre parcours fitness",
      icon: (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-8 w-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
          />
        </svg>
      ),
    },
    {
      number: "230K+",
      label: "ADHÉRENTS",
      description:
        "Une communauté active et motivée qui s'entraîne dans nos clubs",
      icon: (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-8 w-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
          />
        </svg>
      ),
    },
    {
      number: "24/7",
      label: "ACCÈS",
      description:
        "Entraînez-vous quand vous voulez, selon votre emploi du temps",
      icon: (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-8 w-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      ),
    },
  ];

  return (
    <section
      className="py-24 bg-gradient-to-b from-black to-gray-900"
      id="stats"
    >
      <div className="container mx-auto px-6">
        <div className="text-center mb-16">
          <span className="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
            NOS CHIFFRES
            <span className="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-[#f26f21]"></span>
          </span>
          <h2 className="text-4xl md:text-5xl font-extrabold text-white mt-4 mb-4">
            CityClub en Chiffres
          </h2>
          <p className="text-white/70 max-w-2xl mx-auto">
            Découvrez pourquoi nous sommes le réseau de fitness leader au Maroc
            avec une présence nationale et une communauté grandissante
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {stats.map((stat, index) => (
            <div key={index} className="relative overflow-hidden group">
              <div className="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10 h-full transform transition-all duration-300 group-hover:translate-y-[-10px] group-hover:shadow-xl group-hover:shadow-[#f26f21]/10">
                <div className="absolute -right-4 -top-4 w-20 h-20 bg-[#f26f21]/10 rounded-full blur-xl group-hover:bg-[#f26f21]/20 transition-all duration-300"></div>

                <div className="flex items-center mb-4">
                  <div className="mr-4 text-[#f26f21]">{stat.icon}</div>
                  <div className="text-[#f26f21] text-5xl font-black">
                    {stat.number}
                  </div>
                </div>

                <h3 className="text-white text-xl font-bold mb-3">
                  {stat.label}
                </h3>
                <p className="text-white/70">{stat.description}</p>

                <div className="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-[#f26f21] to-[#f26f21]/0 w-0 group-hover:w-full transition-all duration-300"></div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
