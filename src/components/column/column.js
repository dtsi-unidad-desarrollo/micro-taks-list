import './Column.scss';
import Task from '../Task/Task';




const Column = () => {
    
    return (

        <>

    <div className="columns">
        <header>brainstorm</header>
            <ul className='task-list'>
                <Task />
                <li className='task-item'>second</li>
              <li className='task-item'>third</li>
              <li className='task-item'>fourth</li>
              <li className='task-item'>second</li>
              <li className='task-item'>third</li>
              <li className='task-item'>fourth</li>
              <li className='task-item'>second</li>
              <li className='task-item'>third</li>
              <li className='task-item'>fourth</li>
            </ul>
            <footer>add another card...</footer>

        </div>
    
    
    
    
    </>
    )
    





}

export default Column;