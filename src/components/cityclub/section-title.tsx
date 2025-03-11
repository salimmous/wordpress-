interface SectionTitleProps {
  subtitle?: string;
  title: string;
  description?: string;
  align?: "left" | "center";
  textColor?: "dark" | "light";
}

export function SectionTitle({
  subtitle,
  title,
  description,
  align = "center",
  textColor = "dark",
}: SectionTitleProps) {
  return (
    <div
      className={`mb-16 ${align === "center" ? "text-center" : "text-left"}`}
    >
      {subtitle && (
        <span className="inline-block text-[#f26f21] font-semibold text-lg mb-2 relative">
          {subtitle}
          <span className="absolute -bottom-1 left-0 w-12 h-1 bg-[#f26f21]"></span>
        </span>
      )}
      <h2
        className={`text-4xl md:text-5xl font-extrabold ${textColor === "dark" ? "text-gray-900" : "text-white"} mt-4 mb-4 leading-tight`}
      >
        {title}
      </h2>
      {description && (
        <p
          className={`${textColor === "dark" ? "text-gray-600" : "text-white/80"} max-w-2xl ${align === "center" ? "mx-auto" : ""}`}
        >
          {description}
        </p>
      )}
    </div>
  );
}
