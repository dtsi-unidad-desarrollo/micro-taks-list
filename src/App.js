import AppBar from "./components/appbar/appBar";
import BoardBar from "./components/boardbar/boardBar";
import BoardContent from "./components/boardcontent/boardContent";

function App() {
  return (
    <div className="trello-master">
      <AppBar />
      <BoardBar />
      <BoardContent />
    </div>
  );
}

export default App;
