interface ActivityCardProps {
  title: string;
  description: string;
  image: string;
  bgColor: string;
  activityName: string;
}

export function ActivityCard({
  title,
  description,
  image,
  bgColor,
  activityName,
}: ActivityCardProps) {
  return (
    <div className={`w-full rounded-lg overflow-hidden ${bgColor}`}>
      <div className="p-8 flex flex-col md:flex-row items-start gap-6">
        <div className="flex-1">
          <h3 className="text-3xl font-extrabold text-white uppercase tracking-wide mb-3">
            {title}
          </h3>
          <p className="text-white/80 mb-6 text-sm md:text-base">
            {description}
          </p>
          <button className="bg-[#f26f21] hover:bg-[#e05a10] text-white px-6 py-2 rounded-md font-medium transition-colors">
            ESSAYER L'ACTIVITÉ
          </button>
        </div>
        <div className="w-full md:w-1/2 relative">
          <div className="aspect-video rounded-lg overflow-hidden relative">
            <img
              src={image}
              alt={title}
              className="w-full h-full object-cover"
            />
            <div className="absolute inset-0 flex items-center justify-center">
              <h4 className="text-4xl font-black text-white uppercase tracking-wider">
                {activityName}
              </h4>
            </div>
          </div>
          <div className="flex justify-center mt-2">
            <div className="flex space-x-1">
              {[...Array(5)].map((_, i) => (
                <div
                  key={i}
                  className={`w-2 h-2 rounded-full ${i === 0 ? "bg-white" : "bg-white/30"}`}
                />
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
