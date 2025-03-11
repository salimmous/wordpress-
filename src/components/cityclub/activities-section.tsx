import { SectionTitle } from "./section-title";

export function ActivitiesSection() {
  const activities = [
    {
      title: "MUSCULATION",
      description:
        "Développez votre force et sculptez votre corps avec nos programmes de musculation adaptés à tous les niveaux",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&q=80",
      color: "from-red-600 to-red-800",
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
            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"
          />
        </svg>
      ),
    },
    {
      title: "CARDIO",
      description:
        "Améliorez votre endurance et brûlez des calories avec nos équipements cardio de dernière génération",
      image:
        "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=80",
      color: "from-blue-600 to-blue-800",
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
            d="M13 10V3L4 14h7v7l9-11h-7z"
          />
        </svg>
      ),
    },
    {
      title: "COURS COLLECTIFS",
      description:
        "Rejoignez nos cours dynamiques et motivants pour atteindre vos objectifs dans une ambiance conviviale",
      image:
        "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=800&q=80",
      color: "from-green-600 to-green-800",
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
    {
      title: "YOGA & PILATES",
      description:
        "Retrouvez équilibre et sérénité avec nos cours de yoga et pilates pour tous les niveaux",
      image:
        "https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?w=800&q=80",
      color: "from-purple-600 to-purple-800",
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
            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
          />
        </svg>
      ),
    },
    {
      title: "BOXE & MMA",
      description:
        "Développez votre force, votre agilité et votre confiance avec nos cours de boxe et d'arts martiaux mixtes",
      image:
        "https://images.unsplash.com/photo-1549824506-b7045a1a74a2?w=800&q=80",
      color: "from-red-700 to-red-900",
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
      title: "AQUAGYM",
      description:
        "Profitez des bienfaits de l'eau avec nos cours d'aquagym pour une activité physique complète et sans impact",
      image:
        "https://images.unsplash.com/photo-1600965962361-9035dbfd1c50?w=800&q=80",
      color: "from-blue-500 to-blue-700",
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
            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"
          />
        </svg>
      ),
    },
  ];

  return (
    <section className="py-24 bg-white" id="activities">
      <div className="container mx-auto px-6">
        <SectionTitle
          subtitle="NOS ACTIVITÉS"
          title="Des Programmes Variés Pour Tous Les Objectifs"
          description="Découvrez notre large gamme d'activités conçues pour tous les niveaux et tous les objectifs, encadrées par nos coachs professionnels"
        />

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {activities.map((activity, index) => (
            <div
              key={index}
              className="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 group border border-gray-100"
            >
              <div className="relative h-56 overflow-hidden">
                <div
                  className={`absolute inset-0 bg-gradient-to-r ${activity.color} opacity-90 z-10`}
                ></div>
                <img
                  src={activity.image}
                  alt={activity.title}
                  className="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                />
                <div className="absolute inset-0 flex items-center justify-center z-20">
                  <div className="text-white text-center p-6">
                    <div className="bg-white/20 backdrop-blur-sm p-3 rounded-full inline-block mb-4">
                      <div className="text-white">{activity.icon}</div>
                    </div>
                    <h3 className="text-2xl font-bold">{activity.title}</h3>
                  </div>
                </div>
              </div>

              <div className="p-6">
                <p className="text-gray-600 mb-4">{activity.description}</p>
                <div className="flex justify-between items-center">
                  <button className="text-[#f26f21] font-semibold hover:text-[#e05a10] transition-colors flex items-center">
                    Découvrir
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      className="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform"
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
                  </button>
                  <span className="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">
                    Tous niveaux
                  </span>
                </div>
              </div>
            </div>
          ))}
        </div>

        <div className="mt-16 text-center">
          <a
            href="#"
            className="inline-block bg-[#f26f21] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors shadow-lg shadow-[#f26f21]/20"
          >
            VOIR TOUTES NOS ACTIVITÉS
          </a>
        </div>
      </div>
    </section>
  );
}
