export function MobileApp() {
  const features = [
    {
      title: "Réservation de cours",
      description:
        "Réservez vos places dans les cours collectifs directement depuis l'application",
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
      title: "Suivi de progression",
      description:
        "Suivez vos performances et votre évolution avec des graphiques détaillés",
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
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
          />
        </svg>
      ),
    },
    {
      title: "Programmes personnalisés",
      description:
        "Accédez à vos programmes d'entraînement personnalisés créés par nos coachs",
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
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
          />
        </svg>
      ),
    },
    {
      title: "Communauté CityClub",
      description:
        "Rejoignez des défis et partagez vos réussites avec la communauté CityClub",
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
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
          />
        </svg>
      ),
    },
  ];

  return (
    <section
      className="py-20 bg-gradient-to-br from-black to-gray-900 text-white"
      id="app"
    >
      <div className="container mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <span className="text-[#f26f21] font-semibold text-lg">
              APPLICATION MOBILE
            </span>
            <h2 className="text-4xl font-bold mt-2 mb-6">
              Votre Coach Personnel Dans Votre Poche
            </h2>
            <p className="text-white/80 mb-8">
              L'application CityClub vous permet de gérer votre expérience
              fitness où que vous soyez. Réservez des cours, suivez vos progrès
              et accédez à des programmes d'entraînement personnalisés, le tout
              depuis votre smartphone.
            </p>

            <div className="space-y-6">
              {features.map((feature, index) => (
                <div key={index} className="flex">
                  <div className="flex-shrink-0 mr-4">
                    <div className="w-12 h-12 bg-[#f26f21]/20 rounded-lg flex items-center justify-center text-[#f26f21]">
                      {feature.icon}
                    </div>
                  </div>
                  <div>
                    <h3 className="text-xl font-bold mb-2">{feature.title}</h3>
                    <p className="text-white/70">{feature.description}</p>
                  </div>
                </div>
              ))}
            </div>

            <div className="mt-10 flex space-x-4">
              <a
                href="#"
                className="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold flex items-center hover:bg-gray-100 transition-colors"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 mr-2"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.68 1.32-1.53 2.6-2.53 4.08zm-6.84-13.21C9.94 4.3 12.1 2.19 14.63 2c.18 2.79-2.35 4.81-4.42 5.07z" />
                </svg>
                App Store
              </a>
              <a
                href="#"
                className="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold flex items-center hover:bg-gray-100 transition-colors"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 mr-2"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path d="M3.609 1.814L13.792 12 3.609 22.186a.996.996 0 0 1-.609-.92V2.734a1 1 0 0 1 .609-.92zM14.822 13.03l2.388-2.388 5.243 3.044c1.07.62 1.07 2.18 0 2.8l-5.243 3.044-2.388-2.388 3.132-2.056-3.132-2.056z" />
                  <path d="M13.792 12L3.609 1.814 17.436 9.8l-3.644 2.2z" />
                  <path d="M13.792 12l3.644 2.2-7.227 4.186L13.792 12z" />
                </svg>
                Google Play
              </a>
            </div>
          </div>

          <div className="relative">
            <div className="absolute -top-10 -left-10 w-40 h-40 bg-[#f26f21]/20 rounded-full filter blur-3xl"></div>
            <div className="absolute -bottom-10 -right-10 w-40 h-40 bg-[#f26f21]/20 rounded-full filter blur-3xl"></div>

            <div className="relative z-10 flex justify-center">
              <div className="relative w-64 h-[500px] bg-black rounded-[40px] border-[8px] border-gray-800 shadow-2xl overflow-hidden">
                <div className="absolute top-0 left-0 right-0 h-6 bg-black rounded-t-[32px] z-10"></div>
                <img
                  src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1?w=400&q=80"
                  alt="CityClub App"
                  className="absolute inset-0 w-full h-full object-cover"
                />
                <div className="absolute bottom-2 left-0 right-0 flex justify-center">
                  <div className="w-32 h-1 bg-white/30 rounded-full"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
