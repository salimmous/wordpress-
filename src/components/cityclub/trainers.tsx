export function CityClubTrainers() {
  const trainers = [
    {
      name: "Karim Benali",
      role: "Coach de musculation",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=karim&backgroundColor=f26f21",
      expertise: ["Musculation", "Nutrition", "Perte de poids"],
    },
    {
      name: "Leila Tazi",
      role: "Coach de yoga",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=leila&backgroundColor=1a73e8",
      expertise: ["Yoga", "Méditation", "Stretching"],
    },
    {
      name: "Youssef Alami",
      role: "Coach de cardio",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=youssef&backgroundColor=34a853",
      expertise: ["Cardio", "HIIT", "Endurance"],
    },
    {
      name: "Samira Idrissi",
      role: "Coach de pilates",
      image:
        "https://api.dicebear.com/7.x/avataaars/svg?seed=samira&backgroundColor=673ab7",
      expertise: ["Pilates", "Posture", "Réhabilitation"],
    },
  ];

  return (
    <section className="py-20 bg-white" id="coaching">
      <div className="container mx-auto px-6">
        <div className="text-center mb-16">
          <span className="text-[#f26f21] font-semibold text-lg">
            NOS EXPERTS
          </span>
          <h2 className="text-4xl font-bold text-gray-900 mt-2 mb-4">
            Rencontrez Nos Coachs Professionnels
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            Notre équipe de coachs certifiés est là pour vous guider et vous
            motiver à chaque étape de votre parcours fitness
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {trainers.map((trainer, index) => (
            <div
              key={index}
              className="bg-gray-50 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 group"
            >
              <div className="h-48 bg-gradient-to-br from-[#f26f21] to-[#e05a10] flex items-center justify-center">
                <img
                  src={trainer.image}
                  alt={trainer.name}
                  className="h-32 w-32 rounded-full border-4 border-white group-hover:scale-110 transition-transform duration-300"
                />
              </div>
              <div className="p-6">
                <h3 className="text-xl font-bold text-gray-900">
                  {trainer.name}
                </h3>
                <p className="text-[#f26f21] font-medium mb-4">
                  {trainer.role}
                </p>

                <div className="mb-4">
                  <h4 className="text-sm font-semibold text-gray-700 mb-2">
                    Expertise:
                  </h4>
                  <div className="flex flex-wrap gap-2">
                    {trainer.expertise.map((skill, idx) => (
                      <span
                        key={idx}
                        className="bg-gray-200 text-gray-800 text-xs px-3 py-1 rounded-full"
                      >
                        {skill}
                      </span>
                    ))}
                  </div>
                </div>

                <button className="w-full bg-[#f26f21] text-white py-2 rounded-md font-medium hover:bg-[#e05a10] transition-all mt-2">
                  RÉSERVER UNE SÉANCE
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
