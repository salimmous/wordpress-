export function CityClubActivities() {
  const activities = [
    {
      name: "Musculation",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&q=80",
      color: "from-blue-600 to-blue-800",
    },
    {
      name: "Cardio",
      image:
        "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=80",
      color: "from-red-600 to-red-800",
    },
    {
      name: "Yoga",
      image:
        "https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?w=800&q=80",
      color: "from-green-600 to-green-800",
    },
    {
      name: "Pilates",
      image:
        "https://images.unsplash.com/photo-1518310383802-640c2de311b2?w=800&q=80",
      color: "from-purple-600 to-purple-800",
    },
  ];

  return (
    <section className="py-20 bg-black" id="activities">
      <div className="container mx-auto px-6">
        <div className="text-center mb-16">
          <span className="text-[#f26f21] font-semibold text-lg">
            ACTIVITÉS
          </span>
          <h2 className="text-4xl font-bold text-white mt-2 mb-4">
            Nos Programmes d'Entraînement
          </h2>
          <p className="text-white/70 max-w-2xl mx-auto">
            Découvrez notre large gamme d'activités conçues pour tous les
            niveaux et tous les objectifs
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {activities.map((activity, index) => (
            <div
              key={index}
              className={`rounded-2xl overflow-hidden relative h-80 group cursor-pointer bg-gradient-to-br ${activity.color}`}
            >
              <div className="absolute inset-0 opacity-70 group-hover:opacity-40 transition-opacity duration-300">
                <img
                  src={activity.image}
                  alt={activity.name}
                  className="w-full h-full object-cover"
                />
              </div>
              <div className="absolute inset-0 flex items-center justify-center">
                <h3 className="text-4xl font-black text-white tracking-wider group-hover:scale-110 transition-transform duration-300">
                  {activity.name.toUpperCase()}
                </h3>
              </div>
              <div className="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <p className="text-white">
                  Découvrez nos cours de {activity.name.toLowerCase()} adaptés à
                  tous les niveaux, du débutant à l'expert.
                </p>
                <button className="mt-4 bg-[#f26f21] text-white px-4 py-2 rounded-full text-sm font-bold hover:bg-[#e05a10] transition-all">
                  VOIR LES HORAIRES
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
