## About the Project
This project was developed as part of my CIS coursework at Holland College PEI in 2024.

# Weather Forecast Display

## Project Overview
The Weather Forecast Display is a dynamic web application designed to visualize weather forecasts retrieved from a local file. The application displays key weather information for each day, including temperature highs and lows, weather conditions, and additional details. It also calculates and presents weekly average temperatures at the end of the forecast.

This project was initially developed by **Donnie Mckinnon**, with updates and improvements made by **Sherri Ashton**.

---

## Features
- **Dynamic Forecast Rendering**: Parses weather data from a `forecast.txt` file to dynamically generate the forecast for each day.
- **Visual Weather Representation**: Displays corresponding weather images (e.g., sun, rain, snow) based on the conditions.
- **Temperature Details**: Provides high and low temperatures with support for Celsius and Fahrenheit units.
- **Weekly Averages**: Calculates and displays the weekly average high and low temperatures.
- **Error Handling**: Displays a user-friendly error message if the forecast file is unavailable or empty.

---

## How It Works
1. **Data Source**: Reads weather forecast data from a local `forecast.txt` file.
   - Each line of the file represents a day's forecast and follows the format:
     ```
     Day;Date;Month;Year;HighTemp;LowTemp;Condition;AdditionalInfo;Unit;Location
     ```
2. **Dynamic Rendering**:
   - Extracts and parses the forecast data.
   - Displays weather information, including an appropriate image based on the condition (e.g., sunny, rain, snow).
   - Highlights temperature details for both high and low values.
3. **Weekly Temperature Averages**:
   - Calculates the average high and low temperatures for the entire week.
4. **Responsive Design**: Uses Bootstrap for styling and responsive layout.

---

## File Structure
- **forecast.txt**: Contains the weather data to be displayed.
- **images/**: Contains weather condition images (e.g., `sun.jpg`, `rain.jpg`).
- **css/bootstrap.css**: Bootstrap stylesheet for responsive design.
- **index.php**: Main PHP script for rendering the weather forecast.

---

## Credits
- **Donnie Mckinnon**: Original creator of the project.
- **Sherri Ashton**: Enhanced functionality, improved temperature calculation logic, and updated error handling.

---

## Future Enhancements
- Integrate a weather API for real-time forecast updates.
- Add support for additional weather conditions and icons.
- Include a toggle for Celsius/Fahrenheit unit selection.
- Enhance the design with additional styling for improved user experience.
