import { SectionTitle } from "./section-title";

export function ClubMap() {
  const cities = [
    { name: "Casablanca", count: 12 },
    { name: "Rabat", count: 8 },
    { name: "Marrakech", count: 6 },
    { name: "Tanger", count: 5 },
    { name: "Agadir", count: 4 },
    { name: "Fès", count: 4 },
    { name: "Meknès", count: 3 },
    { name: "Oujda", count: 3 },
    { name: "Tétouan", count: 2 },
    { name: "El Jadida", count: 2 },
    { name: "Kénitra", count: 1 },
  ];

  return (
    <section className="py-24 bg-gray-50" id="clubs">
      <div className="container mx-auto px-6">
        <SectionTitle
          subtitle="NOTRE RÉSEAU"
          title="Plus de 50 Clubs à Travers le Maroc"
          description="Avec une seule carte, accédez à un réseau national de plus de 50 clubs dans toutes les grandes villes du Royaume"
        />

        <div className="grid grid-cols-1 lg:grid-cols-5 gap-8">
          <div className="lg:col-span-3 relative rounded-2xl overflow-hidden shadow-xl h-[500px]">
            <div className="absolute inset-0 bg-gray-200">
              <img
                src="https://images.unsplash.com/photo-1580086319619-3ed498161c77?w=1200&q=80"
                alt="Carte des clubs"
                className="w-full h-full object-cover"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent">
                <div className="absolute bottom-0 left-0 right-0 p-8">
                  <div className="flex items-center justify-between">
                    <div>
                      <h3 className="text-white text-2xl font-bold mb-2">
                        Réseau National
                      </h3>
                      <p className="text-white/80">
                        Trouvez un club près de chez vous
                      </p>
                    </div>
                    <div className="bg-[#f26f21] text-white px-4 py-2 rounded-lg font-bold">
                      50+ CLUBS
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* Map pins - would be dynamic in a real implementation */}
            <div className="absolute top-1/4 left-1/3 animate-pulse">
              <div className="w-4 h-4 bg-[#f26f21] rounded-full shadow-lg shadow-[#f26f21]/50"></div>
            </div>
            <div className="absolute top-1/3 left-1/2 animate-pulse delay-100">
              <div className="w-4 h-4 bg-[#f26f21] rounded-full shadow-lg shadow-[#f26f21]/50"></div>
            </div>
            <div className="absolute top-1/2 left-1/4 animate-pulse delay-200">
              <div className="w-4 h-4 bg-[#f26f21] rounded-full shadow-lg shadow-[#f26f21]/50"></div>
            </div>
            <div className="absolute top-2/3 left-2/5 animate-pulse delay-300">
              <div className="w-4 h-4 bg-[#f26f21] rounded-full shadow-lg shadow-[#f26f21]/50"></div>
            </div>
          </div>

          <div className="lg:col-span-2">
            <div className="bg-white p-8 rounded-2xl shadow-lg h-full">
              <h3 className="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-6 w-6 text-[#f26f21] mr-2"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                  />
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                </svg>
                Nos Clubs par Ville
              </h3>

              <div className="grid grid-cols-2 gap-4 mb-8">
                {cities.map((city, index) => (
                  <div
                    key={index}
                    className="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer"
                  >
                    <span className="font-medium">{city.name}</span>
                    <span className="bg-[#f26f21]/10 text-[#f26f21] font-bold px-2 py-1 rounded-md text-sm">
                      {city.count}
                    </span>
                  </div>
                ))}
              </div>

              <div className="bg-[#f26f21]/10 p-4 rounded-xl">
                <div className="flex items-center mb-4">
                  <div className="bg-[#f26f21] p-2 rounded-full text-white mr-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      className="h-5 w-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </div>
                  <h4 className="text-gray-900 font-bold">
                    Vous ne trouvez pas votre ville?
                  </h4>
                </div>
                <p className="text-gray-600 mb-4">
                  Nous ouvrons régulièrement de nouveaux clubs. Laissez-nous vos
                  coordonnées pour être informé des prochaines ouvertures.
                </p>
                <button className="w-full bg-[#f26f21] text-white py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors">
                  ÊTRE NOTIFIÉ
                </button>
              </div>
            </div>
          </div>
        </div>

        <div className="mt-16 flex flex-col md:flex-row items-center justify-center gap-8 bg-white p-8 rounded-2xl shadow-lg">
          <div className="flex-1">
            <h3 className="text-2xl font-bold text-gray-900 mb-4">
              Une Communauté de Plus de 230 000 Membres
            </h3>
            <p className="text-gray-600">
              Rejoignez la plus grande communauté fitness du Maroc et bénéficiez
              d'un accès à tous nos clubs avec une seule carte d'adhésion.
            </p>
          </div>
          <div className="flex-shrink-0">
            <button className="bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors shadow-lg shadow-[#f26f21]/20 flex items-center">
              TROUVER UN CLUB
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-5 w-5 ml-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                />
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}
