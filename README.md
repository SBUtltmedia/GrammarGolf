# Grammar Golf

This project is a web-based application for learning and practicing sentence diagramming and syntax tree construction in a "golf" themed game. The goal is to correctly diagram a sentence in as few "strokes" as possible.

- **Live Application:** [https://sbutltmedia.github.io/GrammarGolf/public](https://sbutltmedia.github.io/GrammarGolf/public)
- **Test Page:** [https://sbutltmedia.github.io/GrammarGolf/public/test.html](https://sbutltmedia.github.io/GrammarGolf/public/test.html)

## Core Concepts

### Courses & Holes

The game is structured into "courses," each of which contains a number of "holes." Each hole presents the user with a sentence to be diagrammed.

### Syntax Trees

The core of the game is building a syntax tree for each sentence. Users interact with the sentence by selecting words and phrases, and then labeling them with their grammatical function (e.g., Noun Phrase, Verb Phrase).

### Strokes & Par

The game tracks the number of "strokes" a user takes to build the syntax tree. A stroke is an action, such as creating a new constituent or labeling a phrase. Each hole has a "par," which is the target number of strokes to complete the diagram. The user's score is determined by how their stroke count compares to the par.

### Grading

The application can be run in two modes: "automatic" and "manual". In automatic mode, the application provides immediate feedback on whether a user's action is correct. In manual mode, the user can build the entire tree and then check their answer.

## Technical Overview

### Frontend

The frontend is built with vanilla HTML, CSS, and JavaScript. It leverages the following libraries:

- **jQuery:** For DOM manipulation and event handling.
- **SortableJS:** For drag-and-drop functionality in the tree-building interface.
- **intro.js:** To provide a guided tour of the application for new users.

The core frontend logic is in `public/scripts/golf.js`. This file manages the game state, user interactions, and the rendering of the syntax tree.

### Backend

A simple backend is provided in `app.js`. It is a Node.js application using the Express framework. The backend is responsible for:

- Serving the static frontend files.
- Saving and loading user progress and problem sets.

### Problem Sets

The courses and holes are defined in JSON files located in `public/problem_sets/`. These JSON files are generated from plain text files (e.g., `Course_01(VP).txt`) using the `mkpb.py` Python script. The text files contain a list of sentences in a bracketed format, which the script converts into the JSON structure used by the application.

## Key Files

- `README.md`: This file.
- `app.js`: The Node.js/Express backend server.
- `public/index.html`: The main entry point for the application.
- `public/scripts/golf.js`: The core frontend logic for the game.
- `public/scripts/grading.js`: Functions for calculating scores and progress.
- `public/scripts/parse.js`: Handles parsing of the bracketed sentence format.
- `public/problem_sets/`: Directory containing the JSON problem sets.
- `Course_*.txt`: Text files used to generate the problem sets.
- `mkpb.py`: Python script for generating problem set JSON files from `.txt` files.

## How to Contribute

To get started with development, you will need to have Node.js and Python installed.

1. **Install Dependencies:**
   ```bash
   npm install
   ```

2. **Run the Server:**
   ```bash
   node app.js
   ```
   The application will then be available at `http://localhost:3000`.

3. **Modifying Problem Sets:**
   - To add or modify problems, edit the appropriate `Course_*.txt` file.
   - After editing a `.txt` file, you must regenerate the corresponding JSON file using the `mkpb.py` script:
     ```bash
     python mkpb.py Course_01\(VP\).txt > public/problem_sets/problem_1.json
     ```
